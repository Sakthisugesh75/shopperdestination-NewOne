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

class Mbanner extends Model
{
  private $banner=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->banner = DB::table('banner_settings');
  }
  public function getbannerListGt($banner, $status, $limit, $offset){
    $this->banner->select('*');
    $this->banner->selectRaw('COUNT(*) OVER() as total_size');
    $this->banner->orderBy('created_at', 'DESC');
    if($limit)
    $this->banner->limit($limit);
    if($offset)
    $this->banner->offset($offset);
    $item=$this->banner->get()->toArray();
    return $item;
  }

  public function getbannerListDt($postData=null){
    $totalData =DB::table('banner_settings')->where('status',"1")->count();
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
    $posts = DB::table('banner_settings')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('banner_settings')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('short_heading', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('banner_settings')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('short_heading', 'LIKE',"%{$search}%")

            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"short_heading"=>$record->short_heading,
				"main_heading"=>$record->main_heading,
				"starting_at"=>$record->starting_at,
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

  public function getbannerListById($id){
    $this->banner->select('*');
    $this->banner->where('id', $id);
    $item=$this->banner->first();
    return $item;
  }

  public function createbanner($category,$s_head,$m_head,$start_price,$created_by,$page){
    $i_status='E';
    $this->banner->where('status', "1");
    $this->banner->where('main_heading', $m_head);
    $item=$this->banner->get()->first();
    if(empty($item)){
      $user_data=array(
        'category_id'       => $category,
        'short_heading'      => $s_head,
        'main_heading'      => $m_head,
        'starting_at'      => $start_price,
        'page'             => $page,
        'status'      => '1',
				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->banner->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updatebanner($id,$category,$s_head,$m_head,$start_price,$updated_by,$page){
    $i_status='E';
    $this->banner->where('status', "1");
    $this->banner->where('main_heading', $m_head)->where('id','!=',$id);
    $item=$this->banner->get()->first();
    $this->banner = DB::table('banner_settings');
    if(empty($item)){
      $user_data=array(
        'category_id'       => $category,
        'short_heading'      => $s_head,
        'main_heading'      => $m_head,
        'starting_at'      => $start_price,
        'page'             => $page,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->banner->where('banner_settings.id', $id);
      if($this->banner->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deletebanner($id){
    $user_data=array(
      'status'    => 0,
    );
    $this->banner->where('id', $id);
    return $this->banner->update($user_data);
  }


  public function getAllbanner(){
    $this->banner->select('*')->where('status',"1");
    $this->banner->orderBy('id', 'DESC');
    $this->banner->limit(1000);
    $item=$this->banner->get()->toArray();
    return $item;
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->banner->where('id', $id);
      return $this->banner->update($user_data);
  }



}
