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

class Mcombo extends Model
{
  private $combo=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->combo = DB::table('combo');
  }
  public function getallCombo(){
    $this->combo->select('*')->where('status',"1");
    $this->combo->orderBy('id', 'DESC');
    $this->combo->limit(1000);
    $item=$this->combo->get()->toArray();
    return $item;
  }

  public function getComboListDt($postData=null){
    $totalData =DB::table('combo')->where('status',"1")->count();
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
    $posts = DB::table('combo')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('combo')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('name', 'LIKE',"%{$search}%")
						->orWhere('slug', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('combo')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('name', 'LIKE',"%{$search}%")
						->orWhere('slug', 'LIKE',"%{$search}%")

            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"name"=>$record->combo_name,
				"slug"=>$record->slug,
                "status"=>$record->status,
				"image_url"=>$record->image_url,
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

  public function getComboListById($id){
    $this->combo->select('*');
    $this->combo->where('id', $id);
    $item=$this->combo->first();
    return $item;
  }

  public function createCombo($name,$slug,$qty,$price,$mrp,$created_by){
    $i_status='E';
    $this->combo->where('status', "1");
    $this->combo->where('combo_name', $name);
    $item=$this->combo->get()->first();
    if(empty($item)){
      $user_data=array(

				'combo_name'      => $name,
				'slug'      => $slug,
				'qty'      => $qty,
				'price'      => $price,
				'mrp'      => $mrp,
				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->combo->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateCombo($id,$name,$slug,$qty,$price,$mrp,$updated_by){
    $i_status='E';
    $this->combo->where('status', "1");
    $this->combo->where('combo_name', $name);
    $this->combo->where('id','!=',$id);
    $item=$this->combo->get()->first();
    $this->combo = DB::table('combo');
    if(empty($item)){
      $user_data=array(
        'combo_name'      => $name,
				'slug'      => $slug,
				'qty'      => $qty,
				'price'      => $price,
				'mrp'      => $mrp,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->combo->where('combo.id', $id);
      if($this->combo->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteCombo($id){
    $user_data=array(
      'status'    => 0,
    );
    $this->combo->where('id', $id);
    return $this->combo->update($user_data);
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->combo->where('id', $id);
      return $this->combo->update($user_data);
  }

  function upload_product_images($image_url, $id) {
    $user_data=array(
        'combo_id'  => $id,
        'image_url'    => $image_url,
        'status'    => '1',
        'created_date'      =>date("Y-m-d H:i:s")
      );
    $item = DB::table('combo_images')->insertGetId($user_data);
    return $item;
  }

  public function getComboListBySlug($slug){
    $this->combo->select('*');
    $this->combo->where('slug', $slug);
    $item=$this->combo->first();
    return $item;
  }

  public function get_Combo_images($id){
    $item=DB::table('combo_images')->where('combo_id',$id)->get()->toArray();
    return $item;
  }


}
