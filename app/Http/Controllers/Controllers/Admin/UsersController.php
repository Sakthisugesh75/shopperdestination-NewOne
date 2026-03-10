<?php
namespace App\Http\Controllers\controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Musers;
use App\Models\Admin\Mrole;

use Session;
use Helper;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    private $musers;
    private $mrole;
    private $data;
    private $method;
    private $helper;
    private $_user;
    public function __construct(){
      $this->musers = new Musers;
      $this->mrole = new Mrole;
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
    function manageUsers(){
        $role = $this->mrole->getAllRole();
        if(!empty($role)) {
            $this->data['role']=$role;
            }else{
              $this->data['role']="";
          }
      return view('admin.users.user_list', $this->data);
    }
    function addUsers(){
        $role = $this->mrole->getAllRole();
        if(!empty($role)) {
            $this->data['role']=$role;
            }else{
              $this->data['role']="";
          }
      return view('admin.users.add_users', $this->data);
    }
    function editUsers($key){
        $user_id=$this->helper->decodeData($key);
        $item=$this->musers->getUsersListById($user_id);
     if(!empty($item)){
        $item->username=$item->mobile?$this->helper->decrypt($item->username):null;
        $item->password=$item->password?$this->helper->decrypt($item->password):null;
        }
    if(!empty($item)) {
          $this->data['record']=$item;
          }else{
            $this->data['record']="";
        }
        $role = $this->mrole->getAllRole();
        if(!empty($role)) {
            $this->data['role']=$role;
            }else{
              $this->data['role']="";
          }
        return view('admin.users.update_users', $this->data);
    }

    function usersProfile(){
      return view('admin.users.user_profile', $this->data);
    }

    function manageCombo(){
        return view('admin.combo.manage_combo', $this->data);
      }

      function manageColor(){
        return view('admin.color.manage_color', $this->data);
      }

      function manageSize(){
        return view('admin.size.manage_size', $this->data);
      }

      function managePage(){
        return view('admin.pages.manage_page', $this->data);
      }

        function manageCoupon(){
        return view('admin.coupon.manage_coupon', $this->data);
      }


}
