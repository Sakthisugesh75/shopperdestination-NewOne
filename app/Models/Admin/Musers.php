<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helper;

class Musers extends Model
{
  private $users=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->users = DB::table('users');
  }
  public function getUsersListGt($role, $status, $limit, $offset){
    $this->users->select('*');
    $this->users->selectRaw('COUNT(*) OVER() as total_size');
    $this->users->orderBy('created_at', 'DESC');
    if($limit)
    $this->users->limit($limit);
    if($offset)
    $this->users->offset($offset);
    $item=$this->users->get()->toArray();
    return $item;
  }

  public function getUsersListDt($postData=null){
    $totalData =DB::table('users')->where('status',"1")->count();
    $totalFiltered = $totalData;
    $draw = $postData['draw'];
    $limit = $postData['length'];
    $start = $postData['start'];
    $order = $postData['order'][0]['column'];
    $dir = $postData['order'][0]['dir'];
    $column = $postData['columns'][$order]['data'];
    $searchValue = $postData['search']['value'];
    if(empty($searchValue))
    {
    $posts = DB::table('users')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('users')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('firstname', 'LIKE',"%{$search}%")
						->orWhere('email', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('users')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
            ->orWhere('firstname', 'LIKE',"%{$search}%")
            ->orWhere('email', 'LIKE',"%{$search}%")

            ->count();
    }
    $data = array();
    foreach($posts as $record ){

      $rolerecords = DB::table('user_role')->where('id', $record->role)->first();
            if (empty($rolerecords)) {
                $role = "-";
            } else {
                $role = $rolerecords->role_name;
            }

      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"username"=>$record->username,
				"password"=>$record->password,
				"firstname"=>$record->first_name,
				"email"=>$record->email,
				"lastname"=>$record->last_name,
                "dob"=>$record->dob,
				"role"=>$role,
				"status"=>$record->status,
				"created_date"=> date("d-M-Y H:i A", strtotime($record->created_date))
      );
    }
    $json_data = array(
    "draw"            => intval($draw),
    "recordsTotal"    => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"            => $data
    );
    echo json_encode($json_data);
  }

  public function getUsersListById($id){
    $this->users->select('*');
    $this->users->where('id', $id);
    $item=$this->users->first();
    return $item;
  }

  public function createUsers($username,$password,$fname,$lname,$email,$dob,$role,$address,$created_by){
    $i_status='E';
    $this->users->where('username', $this->helper->encrypt($username));
    $this->users->where('status', "1");
    $item=$this->users->get()->first();
    if(empty($item)){
      $user_data=array(

                'username'      => $this->helper->encrypt($username),
                'password'      => $this->helper->encrypt($password),
				'first_name'      => $fname,
				'last_name'      => $lname,
				'email'      => $email,
				'dob'      => $dob,
				'role'      => $role,
				'address'      => $address,
				'status'      => "1",
				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->users->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateUsers($id,$username,$password,$fname,$lname,$email,$dob,$role,$address,$updated_by){
    $i_status='E';
    $item=DB::table('users')->where('username', $this->helper->encrypt($username))->where('id','!=',$id)->where('status','1')->get()->first();


    if(empty($item)){
      $user_data=array(
                'username'      => $this->helper->encrypt($username),
                'password'      => $this->helper->encrypt($password),
				'first_name'      => $fname,
				'last_name'      => $lname,
				'email'      => $email,
				'dob'      => $dob,
				'role'      => $role,
				'address'      => $address,
				'status'      => "1",
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      if(DB::table('users')->where('id',$id)->update($user_data)){
        $i_status='S';
      }
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function deleteUsers($id){
    $user_data=array(
      'status'    => 0,
    );
    $this->users->where('id', $id);
    return $this->users->update($user_data);
  }

  public function getallUsers(){
    $this->users->select('*')->where('status',"1");
    $this->users->orderBy('id', 'DESC');
    $this->users->limit(1000);
    $item=$this->users->get()->toArray();
    return $item;
  }

  function profileupload($image_url, $id) {
    $this->users = DB::table('users');
    $user_data=array(
        'profile_url'   => $image_url,
    );
    $this->users->where('users.id', $id);
    return $this->users->update($user_data);
  }

   public function getuserdata($email,$otp){
    // echo $email;
    // echo $otp;
    // $otpdt = $this->helper->decrypt($otp);
    // echo $otpdt;
   $item = DB::table('users')->where('email',$email)->where('otp', $otp)->where('status', "1")->first();
//    print_r($item);
//    exit;
   if(!empty($item)){
    $data = array('otp'=>null);
    $update = DB::table('users')->where('id',$item->id)->update($data);
    return array('status'=>'S', 'list'=> $item);
}else{
    return array('status'=>'E');
  }
}
}
