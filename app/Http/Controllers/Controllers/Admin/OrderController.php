<?php
namespace App\Http\Controllers\controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Morder;
use Session;
use Helper;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    private $morder;
    private $data;
    private $method;
    private $helper;
    private $_user;
    public function __construct(){
      $this->morder = new Morder;
      $this->data=array();
      $this->_user = array();
      $this->helper = new Helper();
      $url = Route::getCurrentRoute()->getActionName();
      $res = explode("@",$url);
      $this->method = $this->urlTokenizer($res[1]);
      $this->middleware(function ($request, $next) {
        if((!session()->has('auth_token')) && $this->method != "login"){
          Redirect::to('/')->send();
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
    function newOrder(){
      return view('admin.order.new_order', $this->data);
    }

    function orderHistory(){
        return view('admin.order.order_history', $this->data);
      }

      function orderDetail($key){
        $order_id=$this->helper->decodeData($key);
        $item=$this->morder->getorderListById($order_id);
        if(!empty($item)){
            $this->data['order']=$item;
        }else{
          $this->data['order']="";
        }
        return view('admin.order.order_detail', $this->data);
      }

      function invoice($key){
        $order_id=$this->helper->decodeData($key);
        $item=$this->morder->getorderListById($order_id);
        if(!empty($item)){
            $this->data['order']=$item;
        }else{
          $this->data['order']="";
        }
        return view('admin.order.invoice', $this->data);
      }

      function reviews(){
        return view('admin.reviews.reviews', $this->data);
      }

}
