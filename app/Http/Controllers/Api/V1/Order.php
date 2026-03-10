<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Morder;
use App\Models\Admin\Mproducts;
use App\Models\Admin\Mcombo;
use App\Models\Admin\Mcolor;
use App\Models\Admin\Msize;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;
use App\Mail\ETMSMTPEmail;
use Illuminate\Support\Facades\Mail;


class Order extends Controller
{

  private $_response_data;
  private $_user;
  private $morder;
  private $mproducts;
  private $mcombo;
  private $mcolor;
  private $msize;
  private $data;
  private $request;
  private $helper;
  private $keyId;
  private $keySecret;

  public function __construct(Request $request){

    $this->keyId = env('RAZORPAY_KEY');
    $this->keySecret = env('RAZORPAY_SECRET');

  $this->request = $request;
  $this->morder = new Morder;
  $this->mproducts = new Mproducts;
  $this->mcombo = new Mcombo;
  $this->mcolor = new Mcolor;
  $this->msize = new Msize;
  $this->_response_data = array();
  $this->data = array();
  $this->_user = array();
  $this->helper = new Helper();
    $url = Route::getCurrentRoute()->getActionName();
    $res = explode("@",$url);
    $method = $res[1];
    if(!in_array($method, array('register','login','addToCart','getcartbysessionid','removeCart','createMail','addProductqty','removeProductqty'))){
      $token = $request->bearerToken();
      $this->_user = $this->helper->getAuthentication($token);
    }
  }
  public function buildResponse()
  {
    if($this->_response_data['code'] && $this->_response_data['code']!='' && !isset($this->_response_data['message']))
      $this->_response_data['message']=__('api.'.$this->_response_data['code']);
    if($this->_user == 401){
      $response_data = array('status' => 'FAILED', 'code' => '401', 'message' => __('api.501'));
      return Response::json($response_data, 200);
    }else {
      return Response::json($this->_response_data, 200);
    }
  }
  function checkValidator($rules){
    $validator = Validator::make($this->request->all(), $rules);
    if($validator->fails()){
      $this->_response_data['status']="FAILED";
      $this->_response_data['message']=$validator->errors()->all();
    }
  }


  function getallOrder(){
    $list=$this->morder->getallOrder();
    if(!empty($list)){
      $this->_response_data['status']="SUCCESS";
      $this->_response_data['list']=$list;
      $this->_response_data['code']="206";
    }else{
      $this->_response_data['status']="FAILED";
      $this->_response_data['code']="109";
    }
  return $this->buildResponse();
}

  function listOrderdt(){
    $postData = $this->request->input();
    $data = $this->morder->getOrderListDt($postData);
    return $data;
  }

  function listOrderdtbystatus(){
    $status = ['NEW','PENDING','READY TO SHIP'];
    $postData = $this->request->input();
    $data = $this->morder->getorderListDtbyStatus($postData,$status);
    return $data;
  }

  function listOrderById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->morder->getOrderListById($id);
        $record=array();
        if(!empty($list) ){
            $record=$list;
        }
        $this->_response_data['status']="SUCCESS";
        $this->_response_data['list']=$record;
        $this->_response_data['code']="206";
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="207";
    }
    return $this->buildResponse();
 }

  function createOrder(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $Order_name=$this->request->input('Order_name');
			$created_by=$this->_user['user_id'];
      if($Order_name != ""){
        $i_status=$this->morder->createOrder($Order_name,$created_by);
        if($i_status=='A'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="208";
        }else if($i_status=='E'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="105";
        }else{
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="201";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }
  function updateOrder(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');
			$Order_name=$this->request->input('u_Order_name');
			$updated_by=$this->_user['user_id'];
      if($id != "" && $Order_name != ""){
        $i_status=$this->morder->updateOrder($id,$Order_name,$updated_by);
        if($i_status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="202";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="209";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }
  function deleteOrder(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->morder->deleteOrder($id);
        if($status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="205";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="302";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }
    return $this->buildResponse();
  }

  function listReviewdt(){
    $postData = $this->request->input();
    $data = $this->morder->getReviewListDt($postData);
    return $data;
  }


  function addToCart(){
    // $user_id = $this->_user['user_id'];
    if(session()->has('user_id')){
        $user_id = session('user_id');
    }else{
        $user_id = "";
    }
    $product_id = $this->request->input('id');
    $combo = $this->request->input('combo');

if($combo == "0"){

    $size = $this->request->input('size');
    $color = $this->request->input('color');

    $productDt = $this->mproducts->getProductsListById($product_id);
    $product_price = $productDt->price;
    $product_name = $productDt->product_name;
    $data = "";

}else{
    $sizes = $this->request->input('size', []); // Ensure it's an array
    $colors = $this->request->input('color', []); // Ensure it's an array

    // print_r($sizes); // Debugging: Check if array has expected values
    // print_r($colors); // Debugging: Check if array has expected values

    $itemcount = min(count($sizes), count($colors)); // Ensure loop doesn't exceed available data
    $dt = [];

    $sizeDt = $this->msize->getSizeListByIds($sizes);
    $colorDt = $this->mcolor->getColorListByIds($colors);

    // print_r($sizeDt);
    // print_r($colorDt);

    for ($i = 0; $i < $itemcount; $i++) {



        foreach ($sizeDt as $key => $size) {
            if($sizes[$i] == $size->id){
                $sizeName = $size->size;
            }
        }

        foreach ($colorDt as $key => $color) {
            if($colors[$i] == $color->id){
                $colorName = $color->color;
            }
        }

        $dt[] = [
            'id' => $i + 1,
            'size' => $sizeName,
            'color' => $colorName
        ];
        $data = json_encode($dt);
    }

    // print_r($dt); // Debugging: Final output
// exit;

    $comboDt = $this->mcombo->getComboListById($product_id);
    $product_price = $comboDt->price;
    $product_name = $comboDt->combo_name;

    $size = "";
    $color = "";
}


    if(session()->has('session_id')){
        $session_id = session('session_id');
    }else{

        $session_id = random_int(1000000, 9999999);
        session()->put('session_id', $session_id);

    }

    $record = $this->morder->addToCart($user_id,$product_id,$product_name,$product_price,$session_id,$size,$color,$combo,$data);

    if(!empty($record)){
        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="203";
        $this->_response_data['data']=$record;
        $this->_response_data['session_id']=$session_id;
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="102";
      }
      return $this->buildResponse();

  }

  function removeCart(){
    $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $product_id=$this->request->input('product_id');
      $session_id=$this->request->input('session_id');
    //   echo $product_id;
    //   echo $session_id;
    //   exit;
      $record = $this->morder->removecart($session_id,$product_id);
      if($record['status'] == "S"){
        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="201";
      if(empty($record['data'])){
        session()->forget('session_id');
        session()->forget('count');
      }
    }else if($record['status'] == "A"){
        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="201";
        if($record['data'] == ""){
            session()->forget('session_id');
            session()->forget('count');
        }
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }
      return $this->buildResponse();
  }

  function checkOut(){


    $fullname=$this->request->input('fullname');
    $email=$this->request->input('email');
    $mobile=$this->request->input('mobile');
    $city=$this->request->input('city');
    $state=$this->request->input('state');
    $country=$this->request->input('country');
    $postcode=$this->request->input('postcode');
    $address=$this->request->input('address');
    $order_notes=$this->request->input('order_notes');
    $landmark=$this->request->input('landmark');
    $shipping=$this->request->input('shipping');

        $coupon_discount=$this->request->input('coupon_discount');
    $applied_coupon_code=$this->request->input('applied_coupon_code');




    if(session()->has('session_id')){
        $session_id = session('session_id');
        $delivery_status = "New";

    $user_id=$this->_user['user_id'];
    $invoice_num = date('y') . $user_id . date('m') . date('d') . rand(10, 1000);
        // $invoice_num = "";

    $order_status = "Pending";



    $i_status = $this->morder->createOrder($session_id,$invoice_num,$user_id,$order_status,$delivery_status,$order_notes,$coupon_discount,$applied_coupon_code,$shipping);

    if($i_status['status'] =='A'){
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
        $this->_response_data['error']="Failed to Create the Order";
      }else{
        $order_id = $i_status['order_id'];
        $price = $i_status['price'];
        $this->morder->createOrdersShippingAddress($order_id,$fullname,$address,$city,$country,$postcode,$mobile,$state,$landmark);




            $currency = "INR";
            $currency_value = "1";
            $prices = $price * $currency_value;
            $price = $prices * 100;



             $curl = curl_init();



               curl_setopt_array($curl, array(
                 CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_ENCODING => '',
                 CURLOPT_MAXREDIRS => 10,
                 CURLOPT_TIMEOUT => 0,
                 CURLOPT_FOLLOWLOCATION => true,
                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                 CURLOPT_CUSTOMREQUEST => 'POST',
                 CURLOPT_POSTFIELDS =>'{
                 "amount": '.$price.',
                 "currency": "'.$currency .'",
                 "receipt": "'.$order_id.'"

               }',
               CURLOPT_HTTPHEADER => array(
                 'Authorization: Basic'.base64_encode("{$this->keyId}:{$this->keySecret}"),
                 'Content-Type: application/json'
               ),
               ));

               $response = curl_exec($curl);

               curl_close($curl);

               $res = json_decode($response);

            //    print_r($res);
            //    exit;

           $payment_status = "Initiated";

            $this->morder->inserttransaction($user_id,$order_id,$res->id,$prices,$payment_status);

            // $response =  Delhivery::waybill()->fetch([
            //     'client_name' => ''
            // ]);
            $this->_response_data['payment_id']= $res->id;
        }


        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="201";
        $this->_response_data['order_id']= $i_status['order_id'];
        $this->_response_data['amount']= $i_status['price'];


     }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }




  function addProductqty(){
    $cart_id=$this->request->input('cart_id');
    $prod_id=$this->request->input('prod_id');


    if($cart_id != "" && $prod_id != ""){
        $i_status=$this->morder->addQuantityinCart($cart_id, $prod_id);
        if($i_status['status'] == 'S'){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="202";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="209";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }

  function removeProductqty(){
    $cart_id=$this->request->input('cart_id');
    $prod_id=$this->request->input('prod_id');


    if($cart_id != "" && $prod_id != ""){
        $i_status=$this->morder->removeQuantityinCart($cart_id, $prod_id);
        if($i_status['status'] == 'S'){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="202";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="209";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }

  function updateOrderStatus(){
    $order_id=$this->request->input('order_id');
    $payment = $this->request->input('payment');
    $order_status=$this->request->input('order_status');
    $delivery_status=$this->request->input('delivery_status');
    $updated_by=$this->_user['user_id'];

    if($order_id != "" && $order_status != ""){
        $i_status=$this->morder->updateOrderStatus($order_id,$payment,$order_status,$delivery_status,$updated_by);
        if($i_status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="202";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="209";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }


  function updateOrderCurrentStatus(){
    $order_id=$this->request->input('id');
    $order_status=$this->request->input('status');
    $delivery_status=$this->request->input('deliverystatus');
    $updated_by=$this->_user['user_id'];

    if($order_id != "" && $order_status != ""){
        $i_status=$this->morder->updateOrderCurrentStatus($order_id,$order_status,$delivery_status,$updated_by);
        if($i_status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="202";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="209";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }



function getcartbyuserid(){
    $user_id = session('user_id');
    if($user_id){
        $item = $this->morder->getcartByuserid($user_id);
        if($item['status'] == 'S'){
            $session_id = $item['data'][0]->session_id;
            session()->put('session_id', $session_id);
            $this->_response_data['status']="SUCCESS";
            $this->_response_data['code']="203";
            $this->_response_data['data']=$item['data'];
        }else{
            $this->_response_data['status']="FAILED";
            $this->_response_data['code']="209";
        }
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
    }
    return $this->buildResponse();
}


function getcartbysessionid(){
    $session_id = session('session_id');
    if($session_id){
        $item = $this->morder->getcart($session_id);
        if($item['status'] == 'S'){
            // $session_id = $item['data'][0]->session_id;
            // session()->put('session_id', $session_id);
            $this->_response_data['status']="SUCCESS";
            $this->_response_data['code']="203";
            $this->_response_data['data']=$item['data'];
        }else{
            $this->_response_data['status']="FAILED";
            $this->_response_data['code']="209";
        }
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
    }
    return $this->buildResponse();
}

function createMail(){

    // $id = $this->request->input('id');

    $email = $this->request->input('email');


    // $data = $this->morder->getOrderListById($id);
    // if($data){
    //     $maildata=$data;
    //   }else{
    //     $maildata="";
    //   }



    $to = $email;
    $mail_type = $this->request->input('mailtype');


    $subject = $mail_type;

    if($mail_type == 'order-confirm'){
    $id = $this->request->input('id');

    $orderDt = $this->morder->getorderListById($id);

    $invoiceno = $orderDt->invoice_number;
    $total = $orderDt->net_amount;

    $customer = $orderDt->customer;
    $address = $orderDt->address;
    $orderitems = $orderDt->data;

    $createddate = $orderDt->created_date;

    $details = ['subject'=>$subject,'mail_type'=>$mail_type,'invoiceno'=>$invoiceno, 'total'=>$total,'address'=> $address, 'items' => $orderitems, 'customer'=> $customer,'date'=>$createddate];


    }else if($mail_type == 'registration'){
    $username = $this->request->input('username');
    $password = $this->request->input('password');

        $details = ['subject'=>$subject,'mail_type'=>$mail_type,'username'=>$username, 'password'=>$password];
    }else if($mail_type == 'confirm_order'){

        $order_id = $this->request->input('id');

        $orderDt = $this->morder->getorderListById($order_id);



        $invoiceno = $orderDt->invoice_number;
        $total = $orderDt->net_amount;

        $customer = $orderDt->customer;
        $to = $customer->email;
        $address = $orderDt->address;
        $orderitems = $orderDt->data;

        $createddate = $orderDt->created_date;

        $subject = "Order COnfirmation for Order #".$invoiceno;

        $mail_type = "order-confirm";

        $details = ['subject'=>$subject,'mail_type'=>$mail_type,'invoiceno'=>$invoiceno, 'total'=>$total,'address'=> $address, 'items' => $orderitems, 'customer'=> $customer,'date'=>$createddate];

        // Mail::to($to)->send(new ETMSMTPEmail($details));
        // $details = ['subject'=>$subject,'mail_type'=>$mail_type];
    }

    // print_r($details);
    // exit;

    Mail::to($to)->send(new ETMSMTPEmail($details));

    $this->_response_data['status']="SUCCESS";
    $this->_response_data['message']="Mail Send Successfully";
    $this->_response_data['code']="206";

  return $this->buildResponse();
}


function updateInvoice(){
    $order_id=$this->request->input('o_id');
    
    $length=$this->request->input('length');
    $width=$this->request->input('width');
    $height=$this->request->input('height');
    $weight=$this->request->input('weight');
    $courier=$this->request->input('courier');


    if($order_id != ""){

    if($courier == 'delhivery'){

        $list=$this->morder->getOrderListById($order_id);

        $name = $list->address->fullname;
        $city = $list->address->city_name;
        $state = $list->address->state_name;
        $country = $list->address->country_name;
        $address = $list->address->address;
        $pincode = $list->address->zipcode;
        $phone = $list->address->phone;
        $orderamount = $list->net_amount;



        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'format=json&data={
        "shipments": [
            {
                "country": "'.$country.'",
                "city": "'.$city.'",
                "seller_add": "",
                "cod_amount": "0",
                "return_phone": "9502079151",
                "seller_inv_date": "",
                "seller_name": "",
                "pin": "'.$pincode.'",
                "seller_inv": "",
                "state": "'.$state.'",
                "return_name": "Thirumala nilaya",
                "order": "'.$order_id.'",
                "add": "'.$address.'",
                "payment_mode": "Prepaid",
                "quantity": "1",
                "return_add": "No 9 1st A main road 1st cross munisuppa reddy layout hongachandra. Near rajarajeshwari temple",
                "seller_cst": "",
                "seller_tin": "",
                "phone": "'.$phone.'",
                "total_amount": "'.$orderamount.'",
                "name": "'.$name.'",
                "return_country": "India",
                "return_city": "Bangalore",
                "return_state": "Karnataka",
                "return_pin": "560068",
                "weight": "'.$weight.'",
                "shipment_height": "'.$height.'",
                "shipment_width": "'.$width.'",
                "shipment_length": "'.$length.'",
                "shipping_mode": "Surface"
            }
        ],
        "pickup_location": {
            "name": "Thirumala nilaya",
            "city": "Bangalore",
            "pin": "560068",
            "country": "India",
            "phone": "9502079151",
            "add": "No 9 1st A main road 1st cross munisuppa reddy layout hongachandra. Near rajarajeshwari temple",
            "state": "Karnataka"
        }
    }',


          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 959f826fcefd490da65cd531d9c123ace2726576',
            'Content-Type: application/json',
            'Cookie: sessionid=ze4ncds5tobeyynmbb1u0l6ccbpsmggx; sessionid=lx47g5tfzfsei3l3pak3th8xjh3i50sd'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $awbdata = json_decode($response);

        // print_r($awbdata);
        // exit;

        $awb = $awbdata->packages[0]->waybill;
        $tracking_url= 'https://www.delhivery.com/tracking';
         $this->morder->awbUpdate( $order_id,$courier,$awb,$tracking_url);
         
    }else{
    $tracking_url=$this->request->input('track_url');

        $awb=$this->request->input('awb');
         $this->morder->awbUpdate($order_id,$courier,$awb,$tracking_url);
         
    }
  

        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="206";

    
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="209";
      }
    

    return $this->buildResponse();

}

}
