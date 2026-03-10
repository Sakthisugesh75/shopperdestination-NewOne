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

class Mcoupon extends Model
{
  private $coupon=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->coupon = DB::table('coupon');
  }
  public function getallCoupon(){
    $this->coupon->select('*')->where('status',"1");
    $item=$this->coupon->get()->toArray();
    return $item;
  }

  public function getCouponListDt($postData=null){
    $totalData =DB::table('coupon')->where('status',"1")->count();
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
    $posts = DB::table('coupon')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('coupon')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('coupon', 'LIKE',"%{$search}%")


            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('coupon')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('coupon', 'LIKE',"%{$search}%")


            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"coupon_code"=>$record->coupon_code,
				"coupon_value"=>$record->coupon_value,
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

  public function getCouponListById($id){
    $this->coupon->select('*');
    $this->coupon->where('id', $id);
    $item=$this->coupon->first();
    return $item;
  }




  public function getCouponListByCode($ccode){
    $this->coupon->select('*');
    $this->coupon->where('coupon_code', $ccode);
    $item=$this->coupon->first();
    return $item;
  }

  public function getCouponListByIds($data){
    $item = $this->coupon->whereIn('id', $data)->get()->keyBy('id');
    return $item;
   }

  public function createCoupon($coupon_code,$coupon_type,$coupon_value,$created_by){
    $i_status='E';
    $this->coupon->where('status', "1");
    $this->coupon->where('coupon_code', $coupon_code);
    $item=$this->coupon->get()->first();
    if(empty($item)){
      $user_data=array(

				'coupon_code'      => $coupon_code,
				'coupon_type'      => $coupon_type,
				'coupon_value'      => $coupon_value,

				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->coupon->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateCoupon($id,$coupon_code,$coupon_type,$coupon_value,$updated_by){
    $i_status='E';
    $this->coupon->where('status', "1");
    $this->coupon->where('coupon_code', $coupon_code);
    $this->coupon->where('id','!=',$id);
    $item=$this->coupon->get()->first();
    $this->coupon = DB::table('coupon');
    if(empty($item)){
      $user_data=array(
       'coupon_code'      => $coupon_code,
				'coupon_type'      => $coupon_type,
				'coupon_value'      => $coupon_value,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->coupon->where('coupon.id', $id);
      if($this->coupon->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteCoupon($id){

    $user_data=array(
      'status'    => 0,
    );
    $this->coupon->where('id', $id);
    return $this->coupon->update($user_data);

  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->coupon->where('id', $id);
      return $this->coupon->update($user_data);
  }


}
