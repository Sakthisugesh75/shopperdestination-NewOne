<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mcombo;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;


class Combo extends Controller
{

  private $_response_data;
  private $_user;
  private $mcombo;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->mcombo = new Mcombo;
  $this->_response_data = array();
  $this->data = array();
  $this->_user = array();
  $this->helper = new Helper();
    $url = Route::getCurrentRoute()->getActionName();
    $res = explode("@",$url);
    $method = $res[1];
    if(!in_array($method, array('register','login'))){
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
  function getallCombo(){
      $list=$this->mcombo->getallCombo();
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

  function listCombodt(){
    $postData = $this->request->input();
    $data = $this->mcombo->getComboListDt($postData);
    return $data;
  }

  function listComboById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->mcombo->getComboListById($id);
        if(!empty($list)){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['list']=$list;
          $this->_response_data['code']="206";
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

  function createCombo(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);

			$name=$this->request->input('name');
			$slug=$this->request->input('slug');
			$qty=$this->request->input('qty');
			$price=$this->request->input('price');
			$mrp=$this->request->input('mrp');

			$created_by=$this->_user['user_id'];
      if($name != "" && $slug != ""){
        $i_status=$this->mcombo->createCombo($name,$slug,$qty,$price,$mrp,$created_by);
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
            $file_name = md5("combo|media|" . date('Y-m-d H:i:s'));
            $target_dir = "cdn/combo/o/".$id;
            $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
            if ($return['status'] == 'S') {
            $m_target_dir = "cdn/combo/m/".$id;
            $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 700, 800); //resize the image
            $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
            } else {
            $invalid_image_format = true;
            }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->mcombo->imageupload($image_url, $id);
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
                  $file_name = md5("comboimages|" . date('Y-m-d H:i:s').$k);
                  $target_dir = "cdn/comboimages/o/".$id;
                  $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
                  if ($return['status'] == 'S') {
                  $m_target_dir = "cdn/comboimages/m/".$id;
                  $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 800, 700); //resize the image
                  $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  } else {
                  $invalid_image_format = true;
                  }
                  } else {
                  $invalid_image_format = true;
                  }
                  if (!empty($image_url)) {

                      $this->mcombo->upload_product_images($image_url, $id);
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
  function updateCombo(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');
      $name=$this->request->input('u_name');
      $slug=$this->request->input('u_slug');
      $qty=$this->request->input('u_qty');
      $price=$this->request->input('u_price');
      $mrp=$this->request->input('u_mrp');
			$updated_by=$this->_user['user_id'];
      if($id != "" && $name != "" && $slug != ""){
        $i_status=$this->mcombo->updateCombo($id,$name,$slug,$qty,$price,$mrp,$updated_by);
        if($i_status){
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
            $file_name = md5("combo|media|" . date('Y-m-d H:i:s'));
            $target_dir = "cdn/combo/o/".$id;
            $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
            if ($return['status'] == 'S') {
            $m_target_dir = "cdn/combo/m/".$id;
            $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 700, 800); //resize the image
            $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
            } else {
            $invalid_image_format = true;
            }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->mcombo->imageupload($image_url, $id);
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
                  $file_name = md5("comboimages|" . date('Y-m-d H:i:s').$k);
                  $target_dir = "cdn/comboimages/o/".$id;
                  $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
                  if ($return['status'] == 'S') {
                  $m_target_dir = "cdn/comboimages/m/".$id;
                  $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 800, 700); //resize the image
                  $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
                  } else {
                  $invalid_image_format = true;
                  }
                  } else {
                  $invalid_image_format = true;
                  }
                  if (!empty($image_url)) {

                      $this->mcombo->upload_product_images($image_url, $id);
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
          $this->_response_data['code']="202";
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
  function deleteCombo(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->mcombo->deleteCombo($id);
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

  function listComboBySlug (){
    $slug=$this->request->input('slug');
    if($slug){
        $list=$this->mcombo->getComboListBySlug($slug);
        if(!empty($list)){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['list']=$list;
          $this->_response_data['code']="206";
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
}
