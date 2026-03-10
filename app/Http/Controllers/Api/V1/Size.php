<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Msize;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;


class Size extends Controller
{

  private $_response_data;
  private $_user;
  private $msize;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->msize = new Msize;
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
  function getallSize(){
      $list=$this->msize->getallSize();
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

  function listSizedt(){
    $postData = $this->request->input();
    $data = $this->msize->getSizeListDt($postData);
    return $data;
  }

  function listSizeById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->msize->getSizeListById($id);
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

  function createSize(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);

			$name=$this->request->input('size');

			$created_by=$this->_user['user_id'];
      if($name != "" ){
        $i_status=$this->msize->createSize($name,$created_by);
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
  function updateSize(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');
      $name=$this->request->input('u_size');

			$updated_by=$this->_user['user_id'];
      if($id != "" && $name != "" ){
        $i_status=$this->msize->updateSize($id,$name,$updated_by);
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
  function deleteSize(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->msize->deleteSize($id);
        if($status){
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['code']="205";
        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="108";
          $this->_response_data['message']="Please remove Product with This Size";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="109";
      }
    return $this->buildResponse();
  }
}
