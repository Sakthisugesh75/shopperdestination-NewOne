<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mproducts;
use App\Models\Admin\Mgroupcode;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;
use Illuminate\Support\Facades\Redirect;


class Products extends Controller
{

  private $_response_data;
  private $_user;
  private $mproducts;
  private $mgroupcode;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->mproducts = new Mproducts;
  $this->mgroupcode = new Mgroupcode;
  $this->_response_data = array();
  $this->data = array();
  $this->_user = array();
  $this->helper = new Helper();
    $url = Route::getCurrentRoute()->getActionName();
    $res = explode("@",$url);
    $method = $res[1];
    if(!in_array($method, array('register','login','querySearch'))){
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
  function getallProducts(){
      $list=$this->mproducts->getallProducts();
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

  function listProductsdt(){
    $postData = $this->request->input();
    $data = $this->mproducts->getProductsListDt($postData);
    return $data;
  }

  function listProductsById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->mproducts->getProductsListById($id);
        if(!empty($list)){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['list']=$list;
          $this->_response_data['code']="206";

          $lists=$this->mproducts->get_Product_images($id);
          if(!empty($lists)){
            $this->_response_data['images']=$lists;
          }else{
            $this->_response_data['images']=array();
          }

        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="109";
        }

    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
    }
    return $this->buildResponse();
 }

  function createProducts(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);


      $productDt=$this->request->input('product');

    //   $group = explode('-',$productDt);

    //   $code = $group[0];


    $product = $this->mgroupcode->getGroupcodeListById($productDt);

      $product_name = $product->product_name;
      $group_code = $product->group_code;

            $category_id=$this->request->input('category_id');
			$sub_category_id=$this->request->input('subcategory_id');
			$slug=$this->request->input('slug');
			$short_desc=$this->request->input('short_desc');
			$offer=$this->request->input('offer');
			$offer_type=$this->request->input('offer_type');
			$qnty=$this->request->input('qnty');
			$detail=$this->request->input('detail');
			$group_tag=$this->request->input('group_tag');
			$video=$this->request->input('video');

            $color=$this->request->input('color');
            $color_name=$this->request->input('color_name');
			$size=$this->request->input('size');
			$price=$this->request->input('price');
			// $price=$this->request->input('price');
			$old_price=$this->request->input('old_price');
			$p_price=$this->request->input('p_price');

            // $qty1 = $this->request->input('qty1');
            // $qty1_price = $this->request->input('qty1_price');
            // $qty2 = $this->request->input('qty2');
            // $qty2_price = $this->request->input('qty2_price');
            // $qty3 = $this->request->input('qty3');
            // $qty3_price = $this->request->input('qty3_price');
            // $qty4 = $this->request->input('qty4');
            // $qty4_price = $this->request->input('qty4_price');
            // $qty5 = $this->request->input('qty5');
            // $qty5_price = $this->request->input('qty5_price');



			$created_by=$this->_user['user_id'];
      if($product_name != ""  && $category_id != "" && $sub_category_id != ""){
        $i_status=$this->mproducts->createProducts($product_name,$group_code,$category_id,$sub_category_id,$slug,$short_desc,$offer,$offer_type,$qnty,$detail,$group_tag,$video,$created_by,$color,$color_name,$size,$p_price,$old_price,$price);
        if($i_status=='A'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="502";
        }else if($i_status=='E'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="105";
        }else{

              $id = $i_status;
            $image_url = '';

            if (isset($_FILES['media']) && !empty($_FILES['media']) ) {
            $media_name = $_FILES['media']['name'];
            $media_type = $_FILES['media']['type'];
            $media_tmp_name = $_FILES['media']['tmp_name'];
            $media_error = $_FILES['media']['error'];
            $media_size = $_FILES['media']['size'];
            $tmp = explode(".", $media_name);
            $media_ext = array_pop($tmp);
            if ($media_ext == 'gif' || $media_ext == 'jpg' || $media_ext == 'jpeg' || $media_ext == 'png' || $media_ext == 'PNG') {
            $file_name = md5("product|media|" . date('Y-m-d H:i:s'));
              // $target_dir = "cdn/product_images/o/".$id;
                  // $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
                  // if ($return['status'] == 'S') {
                  // $m_target_dir = "cdn/product/m/".$id;
                  // $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500); //resize the image
                  // $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  // } else {
                  // $invalid_image_format = true;
                  // }
                  $target_dir   = "cdn/product/o/".$id;
                  $return       = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);

                  if ($return['status'] == 'S') {
                      $m_target_dir = "cdn/product/m/".$id; // <- important
                      $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500);
                      $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  } else {
                  $invalid_image_format = true;
                  }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->mproducts->imageupload($image_url, $id);
              }
          }
            $invalid_image_format = false;

          if (isset($_FILES['images']) && !empty($_FILES['images'])) {
            $file_count = count($_FILES['images']['name']);
            for ($k=0; $k<$file_count; $k++) {
              $image_url = '';
              $media_name = $_FILES['images']['name'][$k];
              $media_type = $_FILES['images']['type'][$k];
              $media_tmp_name = $_FILES['images']['tmp_name'][$k];
              $media_error = $_FILES['images']['error'][$k];
              $media_size = $_FILES['images']['size'][$k];
              $tmp = explode(".", $media_name);
              $media_ext = array_pop($tmp);
              if ($media_ext == 'gif' || $media_ext == 'jpg' || $media_ext == 'jpeg' || $media_ext == 'png' || $media_ext == 'PNG') {
                  $file_name = md5("product_images|" . date('Y-m-d H:i:s').$k);
                   // $target_dir = "cdn/product_images/o/".$id;
                  // $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
                  // if ($return['status'] == 'S') {
                  // $m_target_dir = "cdn/product/m/".$id;
                  // $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500); //resize the image
                  // $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  // } else {
                  // $invalid_image_format = true;
                  // }
                  $target_dir   = "cdn/product_images/o/".$id;
                  $return       = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);

                  if ($return['status'] == 'S') {
                      $m_target_dir = "cdn/product_images/m/".$id; // <- important
                      $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500);
                      $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  } else {
                  $invalid_image_format = true;
                  }
            } else {
            $invalid_image_format = true;
            }
                  if (!empty($image_url)) {

                      $this->mproducts->upload_product_images($image_url, $id);
                  }
                // }
                //   }else{
                //       $this->_response_data['status'] = 'FAILED';
                //       $this->_response_data['error_code'] = '201';
                //       $this->_response_data['message'] = 'Image Type Not Exists';
                //   }
             }
            }


          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="201";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }
  function updateProducts(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('id');
      $productDt=$this->request->input('product');
      $product = $this->mgroupcode->getGroupcodeListById($productDt);

      $product_name = $product->product_name;
      $group_code = $product->group_code;



      $category_id=$this->request->input('category_id');
      $sub_category_id=$this->request->input('subcategory_id');
      $slug=$this->request->input('slug');
      $short_desc=$this->request->input('short_desc');

      $offer=$this->request->input('offer');
      $offer_type=$this->request->input('offer_type');
      $qnty=$this->request->input('qnty');
      $detail=$this->request->input('detail');
      $group_tag=$this->request->input('group_tag');
			$video=$this->request->input('video');

            $color=$this->request->input('color');
            $color_name=$this->request->input('color_name');
            $size=$this->request->input('size');
            // $price=$this->request->input('price');
            $price=$this->request->input('price');
            $old_price=$this->request->input('old_price');
            $p_price=$this->request->input('p_price');




	  $updated_by=$this->_user['user_id'];
      if($id != "" && $product_name != "" && $category_id != "" && $sub_category_id != "" ){
        $i_status=$this->mproducts->updateProducts($id,$product_name,$group_code,$category_id,$sub_category_id,$slug,$short_desc,$offer,$offer_type,$qnty,$detail,$group_tag,$video,$updated_by,$color,$color_name,$size,$p_price,$old_price,$price);
        if($i_status){


     $prod_id =$id;
      //  $this->mproducts->delete_product_prices($prod_id);
            $image_url = '';

            if (isset($_FILES['media']) && !empty($_FILES['media']) ) {
            $media_name = $_FILES['media']['name'];
            $media_type = $_FILES['media']['type'];
            $media_tmp_name = $_FILES['media']['tmp_name'];
            $media_error = $_FILES['media']['error'];
            $media_size = $_FILES['media']['size'];
            $tmp = explode(".", $media_name);
            $media_ext = array_pop($tmp);
            if ($media_ext == 'gif' || $media_ext == 'jpg' || $media_ext == 'jpeg' || $media_ext == 'png' || $media_ext == 'PNG') {
            $file_name = md5("product|media|" . date('Y-m-d H:i:s'));
                  // $target_dir = "cdn/product_images/o/".$id;
                  // $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
                  // if ($return['status'] == 'S') {
                  // $m_target_dir = "cdn/product/m/".$id;
                  // $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500); //resize the image
                  // $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  // } else {
                  // $invalid_image_format = true;
                  // }
                  $target_dir   = "cdn/product/o/".$id;
                  $return       = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);

                  if ($return['status'] == 'S') {
                      $m_target_dir = "cdn/product/m/".$id; // <- important
                      $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500);
                      $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  } else {
                  $invalid_image_format = true;
                  }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->mproducts->imageupload($image_url, $id);
              }
          }
            $invalid_image_format = false;

          if (isset($_FILES['images']) && !empty($_FILES['images'])) {
            $file_count = count($_FILES['images']['name']);
            for ($k=0; $k<$file_count; $k++) {
              $image_url = '';
              $media_name = $_FILES['images']['name'][$k];
              $media_type = $_FILES['images']['type'][$k];
              $media_tmp_name = $_FILES['images']['tmp_name'][$k];
              $media_error = $_FILES['images']['error'][$k];
              $media_size = $_FILES['images']['size'][$k];
              $tmp = explode(".", $media_name);
              $media_ext = array_pop($tmp);
              if ($media_ext == 'gif' || $media_ext == 'jpg' || $media_ext == 'jpeg' || $media_ext == 'png' || $media_ext == 'PNG') {
                  $file_name = md5("product_images|" . date('Y-m-d H:i:s').$k);
                        // $target_dir = "cdn/product_images/o/".$id;
                  // $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
                  // if ($return['status'] == 'S') {
                  // $m_target_dir = "cdn/product/m/".$id;
                  // $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500); //resize the image
                  // $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  // } else {
                  // $invalid_image_format = true;
                  // }
                  $target_dir   = "cdn/product_images/o/".$id;
                  $return       = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);

                  if ($return['status'] == 'S') {
                      $m_target_dir = "cdn/product_images/m/".$id; // <- important
                      $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1000, 1500);
                      $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  } else {
                  $invalid_image_format = true;
                  }
            } else {
            $invalid_image_format = true;
            }
                  if (!empty($image_url)) {

                      $this->mproducts->upload_product_images($image_url, $id);
                  }
                // }
                //   }else{
                //       $this->_response_data['status'] = 'FAILED';
                //       $this->_response_data['error_code'] = '201';
                //       $this->_response_data['message'] = 'Image Type Not Exists';
                //   }
             }
            }
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="201";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="108";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }
  function deleteProducts(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->mproducts->deleteProducts($id);
        if($status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="205";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="108";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }
    return $this->buildResponse();
  }

function deleteProductimage(){
    $id=$this->request->input('id');
        if($id){
        $status=$this->mproducts->delete_Product_image($id);
        if($status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="205";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="108";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }
    return $this->buildResponse();
  }

function updateDealDetails(){
    $id=$this->request->input('id');
    $dealdt=$this->request->input('dealdt');
    $deal_price=$this->request->input('deal_price');
    $start_date=$this->request->input('start_date');
    $end_date=$this->request->input('end_date');
    $updated_by=$this->_user['user_id'];
      if($id != "" && $dealdt != "" && $deal_price != "" && $start_date != ""  && $end_date != "" ){
        $i_status=$this->mproducts->updateDealDetails($id,$dealdt,$deal_price,$start_date,$end_date,$updated_by);
        if($i_status){
            $this->_response_data['status']="SUCCESS";
            $this->_response_data['code']="201";
          }else{
            $this->_response_data['status']="FAILED";
            $this->_response_data['code']="108";
          }
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="109";
        }

      return $this->buildResponse();

}


  function addToWishlist(){
    $prod_id=$this->request->input('prod_id');
    $user_id= $this->_user['user_id'];
    if($prod_id != "" && $user_id != ""){
        $i_status=$this->mproducts->addToWishlist($user_id,$prod_id);
        if($i_status=='A'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="502";
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

  function removeFromWishlist(){
    $id=$this->request->input('id');
    if($id){
    $status=$this->mproducts->removeWishlist($id);
    if($status == 'S'){
      $this->_response_data['status']="SUCCESS";
      $this->_response_data['code']="205";
    }else if($status == 'A'){
      $this->_response_data['status']="FAILED";
      $this->_response_data['code']="108";
    }
  }else{
    $this->_response_data['status']="FAILED";
    $this->_response_data['code']="109";
  }
return $this->buildResponse();

  }

  function getwishlistcountbyuserid (){
    $id=$this->request->input('user_id');
    if($id){
        $list=$this->mproducts->getwishlistcntbyuserid($id);

        $this->_response_data['status']="SUCCESS";
        $this->_response_data['list']=$list;
        $this->_response_data['code']="206";
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="207";
    }
    return $this->buildResponse();
 }

 function querySearch(){
    $key=$this->request->input('data');

    if($key){
        $list=$this->mproducts->getsearch($key);
        // print_r($list);
        // exit;
        foreach ($list as $key => $value) {
            $value->list_id=$value->id?$this->helper->encodeData($value->id):null;

        }
        $this->_response_data['status']="SUCCESS";
        $this->_response_data['list']=$list;
        $this->_response_data['code']="206";
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="207";
    }
    return $this->buildResponse();
 }



}
