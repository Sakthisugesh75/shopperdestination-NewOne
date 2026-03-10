<?php
namespace App\Http\Controllers\controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Mproducts;
use App\Models\Admin\Mcategory;
use App\Models\Admin\Msub_category;
use App\Models\Admin\Mcolor;
use App\Models\Admin\Msize;
use App\Models\Admin\Mgroupcode;
use Session;
use Helper;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    private $mproducts;
    private $mcategory;
    private $msubcategory;
    private $mcolor;
    private $msize;
    private $mgroupcode;
    private $data;
    private $method;
    private $helper;
    private $_user;
    public function __construct(){
      $this->mproducts = new Mproducts;
      $this->mcategory = new Mcategory;
      $this->msubcategory = new Msub_category;
      $this->mcolor = new Mcolor;
      $this->msize = new Msize;
      $this->mgroupcode = new Mgroupcode();
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
    function manageProducts(){

      return view('admin.products.manage_products', $this->data);
    }

    function manageGroupcode(){
        return view('admin.product_group.manage_product_group', $this->data);

    }

    function productDetail(){
        return view('admin.products.product_detail', $this->data);
      }


    function addProducts(){
        $groupcode = $this->mgroupcode->getallGroupcode();
        if(!empty($groupcode)){
            $this->data['groupcode']=$groupcode;
        }else{
            $this->data['groupcode']="";
        }


        $category = $this->mcategory->getallCategory();
        if(!empty($category)){
            $this->data['category']=$category;
        }else{
            $this->data['category']="";
        }
        $sub_category = $this->msubcategory->getallSub_category();
        if(!empty($sub_category)){
            $this->data['subcategory']=$sub_category;
        }else{
            $this->data['subcategory']="";
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
      return view('admin.products.add_products', $this->data);
    }
    function editProducts($key){
        $user_id=$this->helper->decodeData($key);
        $item=$this->mproducts->getProductsListById($user_id);
        if(!empty($item)) {
          $this->data['record']=$item;
          }else{
            $this->data['record']="";
        }

        $groupcode = $this->mgroupcode->getallGroupcode();
        if(!empty($groupcode)){
            $this->data['groupcode']=$groupcode;
        }else{
            $this->data['groupcode']="";
        }


        $category = $this->mcategory->getallCategory();
        if(!empty($category)){
            $this->data['category']=$category;
        }else{
            $this->data['category']="";
        }
        $sub_category = $this->msubcategory->getallSub_category();
        if(!empty($category)){
            $this->data['subcategory']=$sub_category;
        }else{
            $this->data['subcategory']="";
        }
        $images = $this->mproducts->get_Product_images($user_id);
        if(!empty($images)) {
            $this->data['images']=$images;
            }else{
              $this->data['images']="";
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
        return view('admin.products.update_products', $this->data);
    }

    function manageBanner(){
        $category = $this->mcategory->getallCategory();
        if(!empty($category)){
            $this->data['category']=$category;
        }else{
            $this->data['category']="";
        }
        return view('admin.banner.list_banner', $this->data);
      }
}
