<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mbanner;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;


class Banner extends Controller
{

  private $_response_data;
  private $_user;
  private $mbanner;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->mbanner = new Mbanner;
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


  function getallbanner(){
    $list=$this->mbanner->getallbanner();
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

  function listbannerdt(){
    $postData = $this->request->input();
    $data = $this->mbanner->getbannerListDt($postData);
    return $data;
  }

  function listbannerById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->mbanner->getbannerListById($id);
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

  function createbanner(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);

      $category=$this->request->input('category_id');
      $s_head=$this->request->input('s_head');
      $m_head=$this->request->input('m_head');
      $start_price=$this->request->input('start_price');
      $page=$this->request->input('page');
			$created_by=$this->_user['user_id'];
      if($category != ""){
        $i_status=$this->mbanner->createbanner($category,$s_head,$m_head,$start_price,$created_by,$page);
        if($i_status=='A'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="208";
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
            $file_name = md5("banner|media|" . date('Y-m-d H:i:s'));
            $target_dir = "cdn/banner/o/".$id;
            $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
            if ($return['status'] == 'S') {
            $m_target_dir = "cdn/banner/m/".$id;
            if($page == 'cat1' || $page == 'cat6'){
                $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 630, 365,$image_url,'#ffffff'); //resize the image
            }else if($page == 'cat2' || $page == 'cat3' || $page == 'cat4' || $page == 'cat5'){
                $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 328, 397,$image_url,'#ffffff'); //resize the image
            }else{
                $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1920, 865,$image_url,'#ffffff'); //resize the image

            }
            $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
            } else {
            $invalid_image_format = true;
            }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->mbanner->imageupload($image_url, $id);
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
  function updatebanner(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');
      $category=$this->request->input('u_category_id');
      $s_head=$this->request->input('u_s_head');
      $m_head=$this->request->input('u_m_head');
      $start_price=$this->request->input('u_start_price');
      $page=$this->request->input('u_page');

			$updated_by=$this->_user['user_id'];
      if($id != "" && $category != ""){
        $i_status=$this->mbanner->updatebanner($id,$category,$s_head,$m_head,$start_price,$updated_by,$page);
        if($i_status){
            // $id = $i_status;
            $image_url = '';

            if (isset($_FILES['media']) && !empty($_FILES['media']) ) {
            $media_name = $_FILES['media']['name'];
            $media_type = $_FILES['media']['type'];
            $media_tmp_name = $_FILES['media']['tmp_name'];
            $media_error = $_FILES['media']['error'];
            $media_size = $_FILES['media']['size'];
            $tmp = explode(".", $media_name);
            $media_ext = array_pop($tmp);
            if ($media_ext == 'gif' || $media_ext == 'jpg' || $media_ext == 'jpeg' || $media_ext == 'png' || $media_ext == 'PNG' || $media_ext == 'JPG') {
            $file_name = md5("banner|media|" . date('Y-m-d H:i:s'));
            $target_dir = "cdn/banner/o/".$id;
            $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
            if ($return['status'] == 'S') {
            $m_target_dir = "cdn/banner/m/".$id;
            if($page == 'cat1' || $page == 'cat6'){
                $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 630, 365,$image_url,'#ffffff'); //resize the image
            }else if($page == 'cat2' || $page == 'cat3' || $page == 'cat4' || $page == 'cat5'){
                $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 328, 397,$image_url,'#ffffff'); //resize the image
            }else{
                $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 1920, 865,$image_url,'#ffffff'); //resize the image

            }
            $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
            } else {
            $invalid_image_format = true;
            }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->mbanner->imageupload($image_url, $id);
              }
          }
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
  function deletebanner(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->mbanner->deletebanner($id);
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


}
