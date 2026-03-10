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

class Msize extends Model
{
  private $size=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->size = DB::table('size');
  }
  public function getallSize(){
    $this->size->select('*')->where('status',"1");
    $this->size->orderBy('id', 'DESC');
    $this->size->limit(1000);
    $item=$this->size->get()->toArray();
    return $item;
  }

  public function getSizeListDt($postData=null){
    $totalData =DB::table('size')->where('status',"1")->count();
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
    $posts = DB::table('size')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('size')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('size', 'LIKE',"%{$search}%")


            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('size')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('size', 'LIKE',"%{$search}%")


            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"size"=>$record->size,
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

  public function getSizeListById($id){
    $this->size->select('*');
    $this->size->where('id', $id);
    $item=$this->size->first();
    return $item;
  }

  public function getSizeListByIds($data){
   $item = $this->size->whereIn('id', $data)->get()->keyBy('id');
   return $item;
  }

  public function createSize($size,$created_by){
    $i_status='E';
    $this->size->where('status', "1");
    $this->size->where('size', $size);
    $item=$this->size->get()->first();
    if(empty($item)){
      $user_data=array(

				'size'      => $size,

				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->size->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateSize($id,$size,$updated_by){
    $i_status='E';
    $this->size->where('status', "1");
    $this->size->where('size', $size);
    $this->size->where('id','!=',$id);
    $item=$this->size->get()->first();
    $this->size = DB::table('size');
    if(empty($item)){
      $user_data=array(
        'size'      => $size,

				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->size->where('size.id', $id);
      if($this->size->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteSize($id){
    $data = DB::table('products')
    ->whereRaw('FIND_IN_SET(?, size)', [$id])
    ->get()
    ->toArray();
    if(empty($data)){

    $user_data=array(
      'status'    => 0,
    );
    $this->size->where('id', $id);
    return $this->size->update($user_data);
    }else{
        return false;
    }
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->size->where('id', $id);
      return $this->size->update($user_data);
  }


}
