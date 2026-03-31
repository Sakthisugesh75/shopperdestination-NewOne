<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Helper;

class Mcommon extends Model
{
  use HasFactory, Notifiable;
  private $users=null;
  private $personal_info=null;
  private $contact_info=null;
  protected $db;
  private $users_tb;
  private $helper;
  public function __construct(){
    $this->users = DB::table('users');
    $this->helper = new Helper();
  }
  public function verifyUser($username, $password){
    $this->users->select('*');
    $this->users->where('username', $this->helper->encrypt($username));
    $this->users->where('password', $this->helper->encrypt($password));
    $this->users->where('status', 1);
    $item=$this->users->first();
    return $item;
  }



  public function createUsers(){
    $admin = "admin";
    $user = "user";
    $i_status='E';
    $this->users->where('username', $this->helper->encrypt($admin));
    $item=$this->users->get()->first();
    if(empty($item)){
      $user_data=array(
        'username'  => $this->helper->encrypt($admin),
        'password'  => $this->helper->encrypt($admin),
        'fullname'  => $admin,
        'role'      => 2,
        'status'    => 1,
        'active'    => 1,
        'created_by'=> 0,
        'creation_date'=>date("Y-m-d H:i:s")
      );
      $user_id=$this->users->insertGetId($user_data);
    }else{
      $i_status='A';
    }

    $this->users->where('username', $this->helper->encrypt($user));
    $item=$this->users->get()->first();
    if(empty($item)){
      $user_data=array(
        'username'  => $this->helper->encrypt($user),
        'password'  => $this->helper->encrypt($user),
        'fullname'  => $user,
        'role'      => 1,
        'status'    => 1,
        'active'    => 1,
        'created_by'=> 0,
        'creation_date'=>date("Y-m-d H:i:s")
      );
      $user_id=$this->users->insertGetId($user_data);
    }else{
      $i_status='A';
    }
    return $i_status;
  }

 public function getdashboardrecords($branch_id,$role_id,$date){
  if($branch_id == "0"){
    $orderstablename = "restaurant_orders";
  }else{
    $orderstablename = "restaurant_orders_".$branch_id;
  }
  $date = date("Y-m-d", strtotime($date));

  $todayorders = DB::table($orderstablename)->where('status', "1")->whereDate('order_date',$date)->sum('total_amount');
  $currentmonthorder = DB::table($orderstablename)->where('status', "1")->whereYear('order_date', Carbon::now()->year)->whereMonth('created_date', Carbon::now()->month)->sum('net_amount');
  $todayorderslist = DB::table($orderstablename)->where('status',"1")->whereDate('order_date', $date)->orderBy('id', 'DESC')->limit(10)->get()->toArray();

    if($role_id == "2"){
        $todayexpenses = DB::table('expenses')->where('status', "1")->whereDate('created_date',$date)->sum('amount');
        $currentmonthexpenses = DB::table('expenses')->where('status', "1")->whereYear('created_date', Carbon::now()->year)->whereMonth('created_date', Carbon::now()->month)->sum('amount');
        $lastexpenseslist = DB::table('expenses')
                        ->leftJoin('expenses_category','expenses_category.id','=','expenses.category_id')
                        ->select('expenses.*','expenses_category.name as category_name')
                        ->where('expenses.status',"1")->orderBy('expenses.id', 'DESC')->limit(10)->get()->toArray();

    }else{
        $todayexpenses = DB::table('expenses')->where('branch_id', $branch_id)->where('status', "1")->whereDate('created_date',$date)->sum('amount');
        $currentmonthexpenses = DB::table('expenses')->where('branch_id', $branch_id)->where('status', "1")->whereYear('created_date', Carbon::now()->year)->whereMonth('created_date', Carbon::now()->month)->sum('amount');
        $lastexpenseslist = DB::table('expenses')
                        ->leftJoin('expenses_category','expenses_category.id','=','expenses.category_id')
                        ->select('expenses.*','expenses_category.name as category_name')
                        ->where('expenses.branch_id', $branch_id)->where('expenses.status',"1")->orderBy('expenses.id', 'DESC')->limit(10)->get()->toArray();

    }

  return array("todayorders"=>$todayorders,
  "date"=>$date,
//   "orderstablename"=>$orderstablename,
  "todayexpenses"=>$todayexpenses,
  "currentmonthorder"=>$currentmonthorder,
  "currentmonthexpenses"=>$currentmonthexpenses,
  "todayorderslist"=>$todayorderslist,
  "lastexpenseslist"=>$lastexpenseslist,

  );


 }

 public function getsetting(){
    $item = DB::table('setting')->first();
    return $item;
 }


public function register($firstname,$lastname,$email,$phone,$address,$country,$state,$city,$pincode)  {
    $i_status='E';
    $this->users->where('username', $this->helper->encrypt($email));
    $item=$this->users->first();
    if(empty($item)){
        $user_data=array(
          'username'  => $this->helper->encrypt($email),
          'password'  => $this->helper->encrypt($phone),
          'first_name'  => $firstname,
          'last_name'  => $lastname,
          'email'  => $email,
          'phone'  => $phone,
          'address'  => $address,
          'country'  => $country,
          'state'  => $state,
          'city'  => $city,
          'pincode'  => $pincode,
          'role'      => 2,
          'status'    => 1,
          'created_by'=> 0,
          'created_date'=>date("Y-m-d H:i:s")
        );
        $user_id=$this->users->insertGetId($user_data);
        $i_status=$user_id;
        } else{
            $i_status='A';
        }
          return $i_status;
}

public function updateprofile($user_id,$fname,$lname,$email,$mobile,$password){
    $i_status='E';
    $this->users->where('email', $email);
    $this->users->where('phone', $mobile);
    $this->users->where('id', "!=",$user_id);
    $item=$this->users->first();
    if(empty($item)){

        if($password != ""){
        $user_data=array(

          'password'  => $this->helper->encrypt($password),
          'email'  => $email,
          'phone'  => $mobile,
          'first_name'  => $fname,
          'last_name'  => $lname,
          'status'    => 1,
          'created_by'=> $user_id,
          'created_date'=>date("Y-m-d H:i:s")
        );
        }else{
            $user_data=array(
                'email'  => $email,
                'phone'  => $mobile,
                'first_name'  => $fname,
                'last_name'  => $lname,
                'status'    => 1,
                'created_by'=> $user_id,
                'created_date'=>date("Y-m-d H:i:s")
              );
        }
        $this->users = DB::table('users');
        $this->users->where('id', $user_id);
        $user_id=$this->users->update($user_data);
        $i_status=$user_id;
        } else{
            $i_status='A';
        }
          return $i_status;


}



public function verifyUserName($username,$otp){

    $item = DB::table('users')->where('username', $this->helper->encrypt($username))->where('status', "1")->first();
    if(!empty($item)){
        $data = array('otp'=>$otp);
        $update = DB::table('users')->where('id',$item->id)->update($data);
        return array('status'=>'S', 'list'=> $item);
    }else{
        return array('status'=>'E');
    }


}

public function updatePassword($id,$password){
    // echo $id;
    // echo $password;
    // exit;

    $i_status='E';

      $user_data=array(
                'password'      => $this->helper->encrypt($password),
				'updated_by'      => $id,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      if(DB::table('users')->where('id',$id)->update($user_data)){
        $i_status='S';
      }else{
      $i_status='A';
    }

    return $i_status;
}






}
