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

class Mpage extends Model
{
  private $page=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->page = DB::table('pages');
  }
  public function getallPage(){
    $this->page->select('*')->where('status',"1");
    $this->page->orderBy('id', 'DESC');
    $this->page->limit(1000);
    $item=$this->page->get()->toArray();
    return $item;
  }

  public function getallPageWpageandLoc($page,$loc){
    $item = $this->page
    ->select('*')
    ->where('page', $page)
    ->where('location', $loc)
    ->where('status', "1")
    ->get()
    ->toArray();
    return $item;
  }

  public function getPageListDt($postData=null){
    $totalData =DB::table('pages')->where('status',"1")->count();
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
    $posts = DB::table('pages')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('pages')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('page', 'LIKE',"%{$search}%")


            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('pages')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('page', 'LIKE',"%{$search}%")


            ->count();
    }
    $data = array();
    foreach($posts as $record ){
      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"page"=>$record->page,
				"location"=>$record->location,
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

  public function getPageListById($id){
    $this->page->select('*');
    $this->page->where('id', $id);
    $item=$this->page->first();
    return $item;
  }

  public function getPageListByIds($data){
   $item = $this->page->whereIn('id', $data)->get()->keyBy('id');
   return $item;
  }

  public function createPage($page,$location,$content,$created_by){
    $i_status='E';

      $user_data=array(

				'page'      => $page,
				'location'      => $location,
				'content'      => $content,
				'status'      => '1',

				'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->page->insertGetId($user_data);
      $i_status=$user_id;

    return $i_status;
  }

  public function updatePage($id,$page,$location,$content,$updated_by){
    $i_status='E';
    $this->page->where('status', "1");
    $this->page->where('page', $page);
    $this->page->where('id','!=',$id);
    $item=$this->page->get()->first();
    $this->page = DB::table('pages');
    if(empty($item)){
      $user_data=array(
        'page'      => $page,
				'location'      => $location,
				'content'      => $content,
                'status'      => '1',
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->page->where('pages.id', $id);
      if($this->page->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deletePage($id){
    $data = DB::table('products')
    ->whereRaw('FIND_IN_SET(?, page)', [$id])
    ->get()
    ->toArray();
    if(empty($data)){

    $user_data=array(
      'status'    => 0,
    );
    $this->page->where('id', $id);
    return $this->page->update($user_data);
    }else{
        return false;
    }
  }

  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->page->where('id', $id);
      return $this->page->update($user_data);
  }


}
