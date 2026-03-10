<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mrole;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;


class Role extends Controller
{

  private $_response_data;
  private $_user;
  private $mrole;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->mrole = new Mrole;
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


  function getallRole(){
    $list=$this->mrole->getallRole();
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

  function listRoledt(){
    $postData = $this->request->input();
    $data = $this->mrole->getRoleListDt($postData);
    return $data;
  }

  function listRoleById (){
    $id=$this->request->input('id');
    if($id){
        $list=$this->mrole->getRoleListById($id);
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

  function createRole(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $role_name=$this->request->input('role_name');
			$created_by=$this->_user['user_id'];
      if($role_name != ""){
        $i_status=$this->mrole->createRole($role_name,$created_by);
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
  function updateRole(){
      $rules=$this->helper->makeValidateRules($this->request->all());
      $this->checkValidator($rules);
      $id=$this->request->input('u_id');
			$role_name=$this->request->input('u_role_name');
			$updated_by=$this->_user['user_id'];
      if($id != "" && $role_name != ""){
        $i_status=$this->mrole->updateRole($id,$role_name,$updated_by);
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
  function deleteRole(){
        $id=$this->request->input('id');
        if($id){
        $status=$this->mrole->deleteRole($id);
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

  function getrolewisepermissionbyroleid(){
    $role_id=$this->request->input('role_id');
    $list=$this->mrole->getrolewisepermissionbyroleid($role_id);
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

  function addorupdaterolepermission(){
    $role_id=$this->request->input('role_id');
    $user_id=$this->_user['user_id'];
    $role_details=$this->request->input('role_details');
    if($role_id != "" && !empty($role_details)){

      $count = count($role_details);
        for ($i=0; $i < $count; $i++) {
          $page_type = $role_details[$i]['page_type'];
          $create_option = $role_details[$i]['create_option'];
          $read_option = $role_details[$i]['read_option'];
          $update_option =  $role_details[$i]['update_option'];
          $delete_option = $role_details[$i]['delete_option'];
          $this->mrole->addorupdaterolepermission($role_id,$user_id,$page_type,$create_option,$read_option,$update_option,$delete_option);
        }
      $this->_response_data['status']="SUCCESS";
      $this->_response_data['code']="202";
    }else{
      $this->_response_data['status']="FAILED";
      $this->_response_data['code']="109";
    }
    return $this->buildResponse();
  }
}
