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

class Mgroupcode extends Model
{
  private $groupcode=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->groupcode = DB::table('product_group');
  }
  public function getallGroupcode(){
    $this->groupcode->select('*')->where('status',"1");
    $item=$this->groupcode->get()->toArray();
    return $item;
  }

  public function getGroupcodeListDt($postData=null){
    $totalData =DB::table('product_group')->where('status',"1")->count();
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
    $posts = DB::table('product_group')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('product_group')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('group_code', 'LIKE',"%{$search}%")
						->orWhere('product_name', 'LIKE',"%{$search}%")


            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('product_group')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('groupcode', 'LIKE',"%{$search}%")


            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"product_name"=>$record->product_name,
				"group_code"=>$record->group_code,
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

  public function getGroupcodeListById($id){
    $this->groupcode->select('*');
    $this->groupcode->where('id', $id);
    $item=$this->groupcode->first();
    return $item;
  }

  public function createGroupcode($name,$group_code,$created_by){
    $i_status='E';
    $this->groupcode->where('status', "1");
    $this->groupcode->where('product_name', $name);
    $item=$this->groupcode->get()->first();
    if(empty($item)){
      $user_data=array(

				'product_name'      => $name,
				'group_code'      => $group_code,

				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->groupcode->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateGroupcode($id,$name,$group_code,$updated_by){
    $i_status='E';
    $this->groupcode->where('status', "1");
    $this->groupcode->where('product_name', $name);
    $this->groupcode->where('id','!=',$id);
    $item=$this->groupcode->get()->first();
    $this->groupcode = DB::table('product_group');
    if(empty($item)){
      $user_data=array(
       'product_name'      => $name,
				'group_code'      => $group_code,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->groupcode->where('product_group.id', $id);
      if($this->groupcode->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteGroupcode($id){
    $data = DB::table('products')->where('product_group',$id)->get()->toArray();
    if(empty($data)){
    $user_data=array(
      'status'    => 0,
    );
    $this->groupcode->where('id', $id);
    return $this->groupcode->update($user_data);
    }else{
        return false;
    }
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->groupcode->where('id', $id);
      return $this->groupcode->update($user_data);
  }


}
