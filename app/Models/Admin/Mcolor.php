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

class Mcolor extends Model
{
  private $color=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->color = DB::table('color');
  }
  public function getallColor(){
    $this->color->select('*')->where('status',"1");
    $item=$this->color->get()->toArray();
    return $item;
  }

  public function getColorListDt($postData=null){
    $totalData =DB::table('color')->where('status',"1")->count();
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
    $posts = DB::table('color')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('color')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('color', 'LIKE',"%{$search}%")


            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('color')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('color', 'LIKE',"%{$search}%")


            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"color"=>$record->color,
				"color_code"=>$record->color_code,
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

  public function getColorListById($id){
    $this->color->select('*');
    $this->color->where('id', $id);
    $item=$this->color->first();
    return $item;
  }

  public function getColorListByIds($data){
    $item = $this->color->whereIn('id', $data)->get()->keyBy('id');
    return $item;
   }

  public function createColor($color,$color_code,$created_by){
    $i_status='E';
    $this->color->where('status', "1");
    $this->color->where('color', $color);
    $item=$this->color->get()->first();
    if(empty($item)){
      $user_data=array(

				'color'      => $color,
				'color_code'      => $color_code,

				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->color->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateColor($id,$color,$color_code,$updated_by){
    $i_status='E';
    $this->color->where('status', "1");
    $this->color->where('color', $color);
    $this->color->where('id','!=',$id);
    $item=$this->color->get()->first();
    $this->color = DB::table('color');
    if(empty($item)){
      $user_data=array(
        'color'      => $color,
        'color_code'      => $color_code,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->color->where('color.id', $id);
      if($this->color->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteColor($id){

    $data = DB::table('products')->where('color',$id)->get()->toArray();
    if(empty($data)){

    $user_data=array(
      'status'    => 0,
    );
    $this->color->where('id', $id);
    return $this->color->update($user_data);
    }else{
        return false;
    }
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->color->where('id', $id);
      return $this->color->update($user_data);
  }


}
