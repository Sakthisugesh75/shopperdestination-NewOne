<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Msub_category;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;


class Sub_category extends Controller
{

  private $_response_data;
  private $_user;
  private $msub_category;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->msub_category = new Msub_category;
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
  function getallSub_category(){
      $list=$this->msub_category->getallSub_category();
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

  function listSub_categorydt(){
    $postData = $this->request->input();
    $data = $this->msub_category->getSub_categoryListDt($postData);
    return $data;
  }

  function listSub_categoryById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->msub_category->getSub_categoryListById($id);
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

 function listSub_categoryBycategoryId (){
  $id=$this->request->input('id');
  if($id){
      $list=$this->msub_category->getSub_categoryListBycategoryId($id);
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



  function createSub_category(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);

			$category_id=$this->request->input('category');
			$name=$this->request->input('cat_name');
			$slug=$this->request->input('slug');
			$sortdescription=$this->request->input('sortdescription');
			$fulldescription=$this->request->input('fulldescription');
			$group_tag=$this->request->input('group_tag');
			$created_by=$this->_user['user_id'];
      if($category_id != "" && $name != "" && $slug != ""){
        $i_status=$this->msub_category->createSub_category($category_id,$name,$slug,$sortdescription,$fulldescription,$group_tag,$created_by);
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
            $file_name = md5("sub_category|media|" . date('Y-m-d H:i:s'));
            $target_dir = "cdn/sub_category/o/".$id;
            $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
            if ($return['status'] == 'S') {
            $m_target_dir = "cdn/sub_category/m/".$id;
            $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 620, 400); //resize the image
            $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
            } else {
            $invalid_image_format = true;
            }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->msub_category->imageupload($image_url, $id);
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
  function updateSub_category(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');

			$category_id=$this->request->input('u_category');
			$name=$this->request->input('u_cat_name');
			$slug=$this->request->input('u_slug');
			$sortdescription=$this->request->input('u_sortdescription');
			$fulldescription=$this->request->input('u_fulldescription');
			$group_tag=$this->request->input('u_group_tag');
			$updated_by=$this->_user['user_id'];
      if($id != "" && $category_id != "" && $name != "" && $slug != ""){
        $i_status=$this->msub_category->updateSub_category($id,$category_id,$name,$slug,$sortdescription,$fulldescription,$group_tag,$updated_by);
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
            $file_name = md5("sub_category|media|" . date('Y-m-d H:i:s'));
            $target_dir = "cdn/sub_category/o/".$id;
            $return = $this->helper->saveCdn($media_ext, $media_tmp_name, $media_error, $file_name, $target_dir);
            if ($return['status'] == 'S') {
            $m_target_dir = "cdn/sub_category/m/".$id;
            $this->helper->imageCrop($return['url'], $m_target_dir, $file_name, $media_ext, 620, 400); //resize the image
            $image_url = $m_target_dir . '/' . $file_name . '.' . $media_ext;
            } else {
            $invalid_image_format = true;
            }
            } else {
            $invalid_image_format = true;
            }
            if (!empty($image_url)  ) {
              $this->msub_category->imageupload($image_url, $id);
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
  function deleteSub_category(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->msub_category->deleteSub_category($id);
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
}
