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

class Msub_category extends Model
{
  private $sub_category=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->sub_category = DB::table('sub_category');
  }
  public function getallSub_category(){
    $item = DB::table('sub_category')
    ->leftJoin('category','category.id','=','sub_category.category_id')
    ->select('sub_category.*','category.category_name')
    ->where('sub_category.status',"1")
    ->orderBy('sub_category.id', 'DESC')
    ->get()->toArray();



    return $item;
  }

  public function getSub_categoryListDt($postData=null){
    $totalData =DB::table('sub_category')->where('status',"1")->count();
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
    $posts = DB::table('sub_category')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('sub_category')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('category_id', 'LIKE',"%{$search}%")
						->orWhere('name', 'LIKE',"%{$search}%")
						->orWhere('slug', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('sub_category')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('category_id', 'LIKE',"%{$search}%")
						->orWhere('name', 'LIKE',"%{$search}%")
						->orWhere('slug', 'LIKE',"%{$search}%")

            ->count();
    }
    $data = array();
    foreach($posts as $record ){

        $category = DB::table('category')->where('id', $record->category_id)->first();
        if (empty($category)) {
            $categoryname = "-";
        } else {
            $categoryname = $category->category_name;
        }



      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"category_id"=>$categoryname,
				"name"=>$record->sub_category_name,
				"slug"=>$record->slug,
				"short_desc"=>$record->short_desc,
				"full_desc"=>$record->full_desc,
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

  public function getSub_categoryListById($id){
    $this->sub_category->select('*');
    $this->sub_category->where('id', $id);
    $item=$this->sub_category->first();
    return $item;
  }

  public function getSub_categoryListBycategoryId($id){
    $this->sub_category->select('*');
    $this->sub_category->where('category_id', $id);
    $item=$this->sub_category->get()->toArray();
    return $item;
  }

  public function createSub_category($category_id,$name,$slug,$sortdescription,$fulldescription,$group_tag,$created_by){
    $i_status='E';
    $this->sub_category->where('category_id', $category_id);
    $this->sub_category->where('sub_category_name', $name);
    $this->sub_category->where('status', "1");
    $item=$this->sub_category->get()->first();
    if(empty($item)){
      $user_data=array(

				'category_id'      => $category_id,
				'sub_category_name'      => $name,
				'slug'      => $slug,
				'short_desc'      => $sortdescription,
				'full_desc'      => $fulldescription,
				'tags'      => $group_tag,
				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->sub_category->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateSub_category($id,$category_id,$name,$slug,$sortdescription,$fulldescription,$group_tag,$updated_by){
    $i_status='E';
    $this->sub_category->where('category_id', $category_id);
    $this->sub_category->where('sub_category_name', $name);
    $this->sub_category->where('status', "1");
    $this->sub_category->where('id','!=',$id);
    $item=$this->sub_category->get()->first();
    $this->sub_category = DB::table('sub_category');
    if(empty($item)){
      $user_data=array(
        'category_id'      => $category_id,
        'sub_category_name'      => $name,
        'slug'      => $slug,
        'short_desc'      => $sortdescription,
        'full_desc'      => $fulldescription,
        'tags'      => $group_tag,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->sub_category->where('sub_category.id', $id);
      if($this->sub_category->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteSub_category($id){
    $user_data=array(
      'status'    => 0,
    );
    $this->sub_category->where('id', $id);
    return $this->sub_category->update($user_data);
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->sub_category->where('id', $id);
      return $this->sub_category->update($user_data);
    }

}
