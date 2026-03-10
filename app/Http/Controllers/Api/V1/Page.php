<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mpage;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;


class Page extends Controller
{

  private $_response_data;
  private $_user;
  private $mpage;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->mpage = new Mpage;
  $this->_response_data = array();
  $this->data = array();
  $this->_user = array();
  $this->helper = new Helper();
    $url = Route::getCurrentRoute()->getActionName();
    $res = explode("@",$url);
    $method = $res[1];
    if(!in_array($method, array('register','login','getallPageWpageandLoc'))){
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
  function getallPage(){
      $list=$this->mpage->getallPage();
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

  function listPagedt(){
    $postData = $this->request->input();
    $data = $this->mpage->getPageListDt($postData);
    return $data;
  }

  function listPageById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->mpage->getPageListById($id);
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

  function createPage(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);

			$page=$this->request->input('page');
			$location=$this->request->input('location');
			$content=$this->request->input('content');


			$created_by=$this->_user['user_id'];
      if($page != "" ){
        $i_status=$this->mpage->createPage($page,$location,$content,$created_by);
        if($i_status=='A'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="502";
        }else if($i_status=='E'){
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="105";
        }else{
            $id = $i_status;

          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="201";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }

    return $this->buildResponse();
  }
  function updatePage(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');
      $page=$this->request->input('u_page');
			$location=$this->request->input('u_location');
			$content=$this->request->input('u_content');

			$updated_by=$this->_user['user_id'];
      if($id != "" && $page != "" ){
        $i_status=$this->mpage->updatePage($id,$page,$location,$content,$updated_by);
        if($i_status){

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
  function deletePage(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->mpage->deletePage($id);
        if($status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="205";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="108";
          $this->_response_data['message']="Please remove Product with This Page";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }
    return $this->buildResponse();
  }

  function getallPageWpageandLoc(){
    $page=$this->request->input('page');
    $loc=$this->request->input('loc');
    if($page != "" && $loc != "" ){
    $list=$this->mpage->getallPageWpageandLoc($page,$loc);
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
