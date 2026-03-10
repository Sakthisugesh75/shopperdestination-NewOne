<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Mcommon;
use Route;
use Session;
use Response;
use Illuminate\Support\Facades\DB;
use Helper;
use PDF;
use App\Mail\ETMSMTPEmail;
use Illuminate\Support\Facades\Mail;

class Admin extends Controller
{

  private $_response_data;
  private $_user;
  private $mcommon;
  private $data;
  private $request;
  private $helper;

  public function __construct(Request $request){

  $this->request = $request;
  $this->mcommon = new Mcommon;
  $this->_response_data = array();
  $this->data = array();
  $this->_user = array();
  $this->helper = new Helper();

    //session_start();
    $url = Route::getCurrentRoute()->getActionName();
    $res = explode("@",$url);
    $method = $res[1];
    if(!in_array($method, array('register','login','generateuser','sendmessaage','verifyUserName','updatepassword'))){

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
      $this->_response_data['code']="110";
      $this->_response_data['message']=$validator->errors();
      return true;
    }else{
      return false;
    }
  }


  function login(){
    $rules=$this->helper->makeValidateRules($this->request->all());
    $this->checkValidator($rules);
    $username=$this->request->input('username');
    $password=$this->request->input('password');
    // echo $this->helper->encrypt($username);
    if($username && $password){
      $user=$this->mcommon->verifyUser($username, $password);
      if(!empty($user)){
        if($user->status=='1'){
          $auth_token=$this->helper->encrypt($this->helper->encodeData($user->id)."|".($user->role)."|".time());
          $session_data = [
            'auth_token'  => $auth_token,
            'display_name' => $username,
            'logged_in' => true,
          ];
          session()->put('auth_token', $auth_token);
          session()->put('role', $user->role);
          session()->put('display_name', $username);
          session()->put('logged_in', true);
          session()->put('user_id', $user->id);
          $this->_response_data['status']="SUCCESS";
          $this->_response_data['auth_token']=$auth_token;
          $this->_response_data['role']=$user->role;
          $this->_response_data['code']="203";


        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="107";
        }
      }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="103";
      }
    }else{
      $this->_response_data['status']="FAILED";
      $this->_response_data['code']="102";
    }
    return $this->buildResponse();

  }

   function register(){
    $rules=$this->helper->makeValidateRules($this->request->all());
    $this->checkValidator($rules);
    $firstname=$this->request->input('firstname');
    $lastname=$this->request->input('lastname');
    $email=$this->request->input('email');
    $phone=$this->request->input('phone');
    $address=$this->request->input('address');
    $country=$this->request->input('country');
    $state=$this->request->input('state');
    $city=$this->request->input('city');
    $pincode=$this->request->input('pincode');
    if($firstname != "" && $lastname != "" && $email != "" && $phone != "" && $lastname != ""){
    $item=$this->mcommon->register($firstname,$lastname,$email,$phone,$address,$country,$state,$city,$pincode);
    if($item == 'A'){
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="103";
    }else{

        $to = $email;
        $mail_type = 'registration';

        $subject = "Thank You For Joining With Us";

        $details = ['subject'=>$subject,'mail_type'=>$mail_type,'username'=> $email , 'password' => $phone];

        // print_r($details);
        // exit;

        Mail::to($to)->send(new ETMSMTPEmail($details));





        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="203";

    }
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="102";
    }
    return $this->buildResponse();
  }


  function sendmessaage(){


    $name=$this->request->input('name');
    $mobile=$this->request->input('mobile');
    $email=$this->request->input('email');
    $message=$this->request->input('message');

    $to = "wakudafashionbrand@gmail.com";



    $mail_type = "contact-us";
    $subject = "New Enquiry";
    $title = 'New Enquiry';


    $details = ['subject'=>$subject,'title'=>$title,'mail_type'=>$mail_type,'name'=>$name,'email'=>$email,'mobile'=>$mobile,'message'=>$message];

    // print_r($details);
    // exit;

    Mail::to($to)->send(new ETMSMTPEmail($details));

    $this->_response_data['status']="SUCCESS";
    $this->_response_data['code']="201";

    return $this->buildResponse();


}

function updateprofile(){
    $user_id=$this->_user['user_id'];
    $fname=$this->request->input('first_name');
    $lname=$this->request->input('last_name');
    $email=$this->request->input('email');
    $mobile=$this->request->input('mobile');
    $password=$this->request->input('new_pwd');

    if($email != "" && $mobile != ""){
        $item=$this->mcommon->updateprofile($user_id,$fname,$lname,$email,$mobile,$password);
    if($item == 'A'){
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="104";
    }else{
        $this->_response_data['status']="SUCCESS";
        $this->_response_data['code']="201";
    }
    }else{
        $this->_response_data['status']="FAILED";
        $this->_response_data['code']="102";
    }
    return $this->buildResponse();

}



 function verifyUserName(){
    $rules=$this->helper->makeValidateRules($this->request->all());
    $this->checkValidator($rules);
    $username=$this->request->input('username');
    $otp = random_int(100000, 999999);
    if($username ){
        $user=$this->mcommon->verifyUserName($username,$otp);
          // print_r($user);
          $record = array();
            if($user['status'] =='S'){
                $record = $user['list'];
                $record->otp=$record->otp?$this->helper->encrypt($record->otp):null;
                // print_r($record);
                // exit;
                $to = $record->email;
                $subject = "Password Reset";
                $mail_type = "password-reset";
                $reset_url = 'https://bdenim.in/reset-password/'.$record->email.'/'.$otp;
                $title = 'Reset Password';
                $body = "your order confirm Link for your account for mail data file data testing find";

                $details = ['subject'=>$subject,'title'=>$title,'body'=>$body,'mail_type'=>$mail_type,'reset_url'=>$reset_url];

                // print_r($details);
                // exit;

                Mail::to($to)->send(new ETMSMTPEmail($details));

              $this->_response_data['status']="SUCCESS";
            //   $this->_response_data['auth_token']=$auth_token;
            //   $this->_response_data['user']=$user['list'];
              $this->_response_data['code']="203";

            }else{
              $this->_response_data['status']="FAILED";
              $this->_response_data['code']="107";
            }

        }else{
          $this->_response_data['status']="FAILED";
          $this->_response_data['code']="102";
        }
        return $this->buildResponse();
}

function updatepassword(){
    $id=$this->request->input('id');
    $password=$this->request->input('password');
    if($id != "" && $password != "" ){
        $i_status=$this->mcommon->updatePassword($id,$password);
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

  }
