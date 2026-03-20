<?php
namespace App\Http\Controllers\controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Mproducts;
use App\Models\Admin\Morder;
use App\Models\Admin\Musers;
use App\Models\Admin\Mcountry;
use App\Models\Admin\Mstate;
use App\Models\Admin\Mcity;
use App\Models\Admin\Mbanner;
use App\Models\Admin\Mcombo;
use App\Models\Admin\Mcolor;
use App\Models\Admin\Msize;

use Session;
use Helper;
use Illuminate\Support\Facades\Redirect;
use App\Mail\ETMSMTPEmail;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller{

    private $request;
    private $mproducts;
    private $mbanner;
    private $morder;
    private $mcombo;
    private $muser;
    private $mcountry;
    private $mstate;
    private $mcity;
    private $mcolor;
    private $msize;
    private $data;
    private $method;
    private $helper;
    private $_user;
    private $keyId;
    private $keySecret;
    public function __construct(Request $request){

        $this->keyId = env('RAZORPAY_KEY');
        $this->keySecret = env('RAZORPAY_SECRET');

        $this->request = $request;

      $this->mproducts = new Mproducts;
      $this->morder = new Morder;
      $this->muser = new Musers;
      $this->mcountry = new Mcountry;
      $this->mstate = new Mstate;
      $this->mcity = new Mcity;
      $this->mbanner = new Mbanner;
      $this->mcombo = new Mcombo;
      $this->mcolor = new Mcolor;
      $this->msize = new Msize;
      $this->data=array();
      $this->_user = array();
      $this->helper = new Helper();
      $url = Route::getCurrentRoute()->getActionName();
      $res = explode("@",$url);
      $this->method = $this->urlTokenizer($res[1]);
      $this->middleware(function ($request, $next) {
        if((!session()->has('auth_token')) && $this->method != "home" && $this->method != "faq" && $this->method != "contactus" && $this->method != "aboutus" && $this->method != "privacy_policy" && $this->method != "shipping_policy" && $this->method != "terms_condition" && $this->method != "user_login" && $this->method != "user_register" && $this->method != "user_cart" && $this->method != "product_detail" && $this->method != "product" && $this->method != 'return_policy' && $this->method != 'combo_detail' && $this->method != 'productview' && $this->method != 'userinvoice' && $this->method != "resetPassword" && $this->method != "forgotPassword"){
          Redirect::to('/user-login')->send();
          }
          if(session()->has('auth_token'))
          {
           $this->_user = $this->helper->getAuthentication();

          }
        return $next($request);
      });
      }
    function urlTokenizer($method){
      return $uri_method=str_replace(" ", '', lcfirst(ucwords(str_replace("-"," ",$method))));
    }
    function home(){

        // if(session()->has('auth_token')){
        //     $user_id = session('user_id');
        //     // echo $user_id;
        //     $wishlistcnt = $this->mproducts->getwishlistcntbyuserid($user_id);
        //     // print_r($wishlistcnt);
        //     // exit;
        //     if($wishlistcnt != 0){
        //         $this->data['wishcnt']=$wishlistcnt;
        //     }else{
        //         $this->data['wishcnt']= 0;
        //     }
        // }else{
        //     $this->data['wishcnt']= 0;
        // }



        $products = $this->mproducts->getallProducts();
        if(!empty($products)){
            foreach ($products as $key => $value) {
                $value->list_id=$value->id?$this->helper->encodeData($value->id):null;
                $value->cat_name=$value->category_name?$this->helper->encodeData($value->category_name):null;
            }
            $this->data['products']=$products;
        }else{
            $this->data['products']=[];
        }

        $categoryCnt = $this->mproducts->getallProductsByCategoryCount();
        if(!empty($categoryCnt)){
            foreach ($categoryCnt as $key => $value) {
                $value->cat_name=$value->category_name?$this->helper->encodeData($value->category_name):null;
            }
            $this->data['categoryCnt']=$categoryCnt;
        }else{
            $this->data['categoryCnt']=[];
        }

        $banner = $this->mbanner->getAllbanner();
        if(!empty($banner)){
            $this->data['banner']=$banner;
        }else{
            $this->data['banner']=[];
        }

        $combo = $this->mcombo->getallCombo();
        if(!empty($combo)){
            $this->data['combo']=$combo;
        }else{
            $this->data['combo']=[];
        }




      return view('frontend.index', $this->data);
    }

    public function store(Request $request)
    {
        $pay_id=$request->input('razorpay_payment_id');
        $amount=$request->input('amount');
                        $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.razorpay.com/v1/payments/'.$pay_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                   'Authorization: Basic'.base64_encode("{$this->keyId}:{$this->keySecret}"),
                ),
                ));

                $response = curl_exec($curl);

                $res = json_decode($response);

                curl_close($curl);
                // print_r($response);
                // exit;
                if($res->status == 'captured'){

                    $order_id = $res->notes->merchant_order_id;

                    $payment_id = $res->id;
                    $payment_status = "Success";

                    $this->morder->updateTransaction($order_id,$payment_id,$payment_status);

                    $payment = 'PAID';

                    $order_status = 'NEW';

                    $delivery_status = 'New';

                    $updated_by = session('user_id');

                    $this->morder->updateOrderStatus($order_id, $payment,$order_status,$delivery_status,$updated_by);

                    $orderDt = $this->morder->getorderListById($order_id);

                    $invoiceno = $orderDt->invoice_number;
                    $total = $orderDt->net_amount;

                    $customer = $orderDt->customer;
                    $to = $customer->email;
                    $address = $orderDt->address;
                    $orderitems = $orderDt->data;

                    $createddate = $orderDt->created_date;

                    $subject = "Order Confirmation for Order #".$invoiceno;

                    $mail_type = "order-confirm";

                    $details = ['subject'=>$subject,'mail_type'=>$mail_type,'invoiceno'=>$invoiceno, 'total'=>$total,'address'=> $address, 'items' => $orderitems, 'customer'=> $customer,'date'=>$createddate];

                    Mail::to($to)->send(new ETMSMTPEmail($details));


                }
        return redirect()->back();
    }

    function faq(){
        return view('frontend.common.faq', $this->data);
      }

      function privacy_policy(){
        return view('frontend.common.privacy_policy', $this->data);
      }

      function contactus(){
        return view('frontend.common.contact_us', $this->data);
      }

      function aboutus(){
        return view('frontend.common.about_us', $this->data);
      }

      function terms_condition(){
        return view('frontend.common.terms_condition', $this->data);
      }

      function return_policy(){
        return view('frontend.common.return_policy', $this->data);
      }

        function shipping_policy(){
        return view('frontend.common.shipping', $this->data);
      }

      function user_login(){
        $session_id = session('session_id');
        if($session_id){
            $this->data['session']=$session_id;
          }else{
            $this->data['session']="";
          }
        $this->data['page_type'] = 'login' ;
        return view('frontend.common.user_login', $this->data);
      }

      function user_register(){
        
        $country = '101';
        $state = $this->mstate->getStateByCountry($country);
        if(!empty($state)){
            $this->data['state']=$state;
        }else{
            $this->data['state']= [];
        }
        $city = $this->mcity->getallCity();
        if(!empty($city)){
            $this->data['city']=$city;
        }else{
            $this->data['city']= [];
        }

        return view('frontend.common.user_register', $this->data);
      }

      function user_profile(){
        $user_id = session('user_id');
        $record = $this->muser->getUsersListById($user_id);
        if(!empty($record)){
            $record->username=$record->username?$this->helper->decrypt($record->username):null;
            $record->password=$record->password?$this->helper->decrypt($record->password):null;
            $this->data['users']=$record;
        }else{
            $this->data['users']= [];
        }
        $country = $this->mcountry->getallCountry();
        if(!empty($country)){
            $this->data['country']=$country;
        }else{
            $this->data['country']= [];
        }
        $state = $this->mstate->getallState();
        if(!empty($state)){
            $this->data['state']=$state;
        }else{
            $this->data['state']= [];
        }
        $city = $this->mcity->getallCity();
        if(!empty($city)){
            $this->data['city']=$city;
        }else{
            $this->data['city']= [];
        }

        $item=$this->morder->getorderByuserid($user_id);

        if($item['status'] == 'S') {
            foreach ($item['data'] as $key => $value) {
                $value->id=$value->id?$this->helper->encodeData($value->id):null;
            }
            $this->data['record']=$item['data'];
            }else{
              $this->data['record']="";
          }
        return view('frontend.user.user_profile', $this->data);
      }

      function user_wishlist(){
        if(session()->has('auth_token')){
            $user_id = session('user_id');
        $wislist = $this->mproducts->getallwishlist($user_id);
        if(!empty($wislist)){
            $this->data['wishlist']=$wislist;
        }else{
            $this->data['wishlist']= [];
        }

        }


        return view('frontend.user.mywishlist', $this->data);
      }

      function user_history(){
        $user_id = session('user_id');
        $item=$this->morder->getorderByuserid($user_id);
       
        if($item['status'] == 'S') {
             foreach ($item['data'] as $key => $value) {
            $value->id=$value->id?$this->helper->encodeData($value->id):null;
        }
            $this->data['record']=$item['data'];
            }else{
              $this->data['record']= [];
          }
        return view('frontend.user.myorders', $this->data);
      }

      function user_cart(){
        $session = "";
        if(session()->has('user_id')){
            $user_id = session('user_id');
        }else{
            $user_id = "";
        }


            if(session()->has('session_id')){
                $session = session('session_id');
                $item=$this->morder->getcart($session);
                if($item['status'] == 'S') {
                    $this->data['record']=$item['data'];

                    }else{
                      $this->data['record']="";
                  }

        }

        $this->data['session'] = $session;
        $this->data['pagetype'] = 'cart';
        return view('frontend.order.cart', $this->data);
      }

      function checkout(){
        $user_id = session('user_id');
        if($user_id != "" && $user_id != null){
            $list=$this->muser->getUsersListById($user_id);
            if(!empty($list)){
                $this->data['fullname'] = $list->first_name.' '.$list->last_name;
                $this->data['mobile'] = $list->phone;
                $this->data['email'] = $list->email;
                $this->data['user_id'] = $list->id;
            }else{
                $this->data['fullname'] = '';
                $this->data['mobile'] = '';
                $this->data['email'] = '';
                $this->data['user_id'] = '';

            }
        }else{
            $this->data['fullname'] = '';
            $this->data['mobile'] = '';
            $this->data['email'] = '';
            $this->data['user_id'] = '';

        }

        $session_id = session('session_id');

            $item = $this->morder->getcart($session_id);
            if($item['status'] == 'S'){
                $this->data['cart']=$item['data'];
            }else{
                $this->data['cart'] = [];
            }

            $country = '101';
            $state = $this->mstate->getStateByCountry($country);
            if(!empty($state)){
                $this->data['state']=$state;
            }else{
                $this->data['state']= [];
            }
            $city = $this->mcity->getallCity();
            if(!empty($city)){
                $this->data['city']=$city;
            }else{
                $this->data['city']= [];
            }
        return view('frontend.order.checkout', $this->data);
      }

      function product($keys){

        $temp = $this->helper->decodeData($keys);

        // $encodedt = $this->helper->encodeData($key);
        // echo $encodedt;
        // exit;

            $products = $this->mproducts->getallProducts();
        if(!empty($products)){
            foreach ($products as $key => $value) {
                $value->list_id=$value->id?$this->helper->encodeData($value->id):null;
            }
            $this->data['products']=$products;
            $this->data['category']=$temp;
        }else{
            $this->data['products']=[];
            $this->data['category']='';

        }

        return view('frontend.products.product', $this->data);
      }



      function productview($productname,$color){
        $item=$this->mproducts->getProductByslugandcolor($productname,$color);
        if(!empty($item)){
            $this->data['products']=$item;
            $lists=$this->mproducts->get_Product_images($item->id);
            $colors=$this->mproducts->get_Product_colors($item->product_group);
            $this->data['color']=$colors;
            $this->data['images']=$lists;
            $this->data['selectedcolor']=$color;
        }else{
            $this->data['products']=[];
            $this->data['images']=[];
            $this->data['color']=[];
            $this->data['selectedcolor']="";
        }
        return view('frontend.products.product_detail', $this->data);
      }

      function product_detail($key){
        $prod_id=$this->helper->decodeData($key);
        $item=$this->mproducts->getProductsListById($prod_id);
        if(!empty($item)){
            $this->data['products']=$item;
            $lists=$this->mproducts->get_Product_images($prod_id);

            $this->data['images']=$lists;



        }else{
            $this->data['products']=[];
            $this->data['images']=[];


        }
        return view('frontend.products.product_detail', $this->data);
      }

      function combo_detail($key){
        // $prod_id=$this->helper->decodeData($key);
        $item=$this->mcombo->getComboListBySlug($key);
        if(!empty($item)){
            $this->data['products']=$item;
            $lists=$this->mcombo->get_Combo_images($item->id);
            $this->data['images']=$lists;
        }else{
            $this->data['products']=[];
            $this->data['images']=[];
        }
        $color = $this->mcolor->getallColor();
        if(!empty($color)){
            $this->data['color']=$color;
        }else{
            $this->data['color']="";
        }
        $size = $this->msize->getallsize();
        if(!empty($size)){
            $this->data['size']=$size;
        }else{
            $this->data['size']="";
        }
        return view('frontend.products.combo_detail', $this->data);
      }

      function userinvoice($id){
        $order_id=$this->helper->decodeData($id);
        $item=$this->morder->getorderListById($order_id);
        if(!empty($item)){
            $this->data['order']=$item;
        }else{
          $this->data['order']="";
        }
        return view('frontend.user.userinvoice', $this->data);
      }




      function orderTracking(){
        return view('frontend.order.order_tracking', $this->data);
      }


      function forgotPassword(){
        return view('frontend.common.forgot_password', $this->data);
      }

      function resetPassword($email,$otp){

        // $otp = $this->helper->decrypt($otpdt);

        // echo $otp;
        // exit;
        $user = $this->muser->getuserdata($email,$otp);
        // print_r($user);
        // exit;
        if($user['status'] == 'S'){
            $this->data['user']=$user['list'];
        return view('frontend.common.reset_password', $this->data);

        }else{
            $this->data['user']=[];
        return view('frontend.common.linkexpired', $this->data);

        }

      }
}
