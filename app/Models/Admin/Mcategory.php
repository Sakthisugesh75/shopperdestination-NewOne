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

class Mcategory extends Model
{
  private $category=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->category = DB::table('category');
  }
  public function getallCategory(){
    $this->category->select('*')->where('status',"1");
    $this->category->orderBy('id', 'DESC');
    $this->category->limit(1000);
    $item=$this->category->get()->toArray();
    return $item;
  }

  public function getCategoryListDt($postData=null){
    $totalData =DB::table('category')->where('status',"1")->count();
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
    $posts = DB::table('category')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('category')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('name', 'LIKE',"%{$search}%")
						->orWhere('slug', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('category')
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
				"name"=>$record->category_name,
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

  public function getCategoryListById($id){
    $this->category->select('*');
    $this->category->where('id', $id);
    $item=$this->category->first();
    return $item;
  }

  public function createCategory($name,$slug,$sortdescription,$fulldescription,$group_tag,$created_by){
    $i_status='E';
    $this->category->where('status', "1");
    $this->category->where('category_name', $name);
    $item=$this->category->get()->first();
    if(empty($item)){
      $user_data=array(

				'category_name'      => $name,
				'slug'      => $slug,
				'short_desc'      => $sortdescription,
				'full_desc'      => $fulldescription,
				'tags'      => $group_tag,
				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->category->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateCategory($id,$name,$slug,$sortdescription,$fulldescription,$group_tag,$updated_by){
    $i_status='E';
    $this->category->where('status', "1");
    $this->category->where('category_name', $name);
    $this->category->where('id','!=',$id);
    $item=$this->category->get()->first();
    $this->category = DB::table('category');
    if(empty($item)){
      $user_data=array(
        'category_name'      => $name,
        'slug'      => $slug,
        'short_desc'      => $sortdescription,
        'full_desc'      => $fulldescription,
        'tags'      => $group_tag,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->category->where('category.id', $id);
      if($this->category->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteCategory($id){
    $user_data=array(
      'status'    => 0,
    );
    $this->category->where('id', $id);
    return $this->category->update($user_data);
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->category->where('id', $id);
      return $this->category->update($user_data);
  }


}
