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

class Mproducts extends Model
{
  private $products=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->products = DB::table('products');
  }
  public function getallProducts(){
    $items = DB::table('products')
    ->leftJoin('category','category.id','=','products.category_id')
    ->leftJoin('sub_category','sub_category.id','=','products.sub_category_id')
    ->leftJoin('color','color.id','=','products.color')
    ->select('products.*','category.category_name','category.slug as cat_slug','color.color as color_name','sub_category.sub_category_name')
    ->where('products.status', "1")
    ->orderBy('products.id', 'DESC')
    // ->limit(200)
    ->get()
    ->toArray();

    // print_r($items);
    // exit;
    return $items;





  }


  public function getAllProductsByCategoryCount() {
    $items = DB::table('products')
    ->leftJoin('category','category.id','=','products.category_id')
    ->select('category.category_name','category.slug as categoryslug','category.image_url as categoryimage',DB::raw('SUM(products.qty) As cat_qnty'))
    ->where('products.status', "1")
    ->groupBy('products.category_id')
    ->get()
    ->toArray();

    return $items;
}

  public function get_Product_images($id){
    $item=DB::table('product_images')->where('product_id',$id)->get()->toArray();
    return $item;
  }
  public function getProductsListDt($postData=null){
    $totalData =DB::table('products')->where('status',"1")->count();
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
    $posts = DB::table('products')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
        $search = $searchValue;
        $posts = DB::table('products')
            ->where('status', "1")
            ->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('product_name', 'LIKE', "%{$search}%")
                      ->orWhere('detail', 'LIKE', "%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($column, $dir)
            ->get();

        $totalFiltered = DB::table('products')
            ->where('status', "1")
            ->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('product_name', 'LIKE', "%{$search}%")
                      ->orWhere('detail', 'LIKE', "%{$search}%");
            })
            ->count();
        }
    $data = array();
    foreach($posts as $record ){

        $catDt = DB::table("category")->where("id", $record->category_id)->first();
        if(!empty($catDt)){
            $category = $catDt->category_name;
        }else{
            $category  = "";
        }

        $subcatDt = DB::table("sub_category")->where("id", $record->sub_category_id)->first();
        if(!empty($subcatDt)){
            $sub_category = $subcatDt->sub_category_name;
        }else{
            $sub_category  = "";
        }

        $colorDt = DB::table("color")->where("id", $record->color)->first();
        if(!empty($colorDt)){
            $color = $colorDt->color;
        }else{
            $color  = "";
        }



      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"product_name"=>$record->product_name,
				"product_desc"=>$record->detail,
				"purchase_price"=>$record->purchased_price,
				"price"=>$record->price,
				"color"=>$color,
				"category_id"=>$category,
				"sub_category_id"=>$sub_category,
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

  public function getProductsListById($id){
    $this->products->select('*');
    $this->products->where('id', $id);
    $item=$this->products->first();


        // print_r($item);
        // exit;



    return $item;
  }

//   public function getProductByslugandcolor($productname,$color){
//      $items = DB::table('products')
//     ->leftJoin('color','color.id','=','products.color')
//     ->select('products.*','color.color as color_name','color.color_code')
//     ->where('products.slug', $productname)
//     ->where('products.color', $color)
//     ->first();

//     $items->size = explode(',',$items->size);

//     $sizeDt = array();

//     foreach ($items->size as $key){
//         $size = DB::table('color')->where('id', $key)->first();
//         $sizeDt = array_push($sizeDt, $size);
//     }

//     $items->size_name = implode(',',$sizeDt);

//     return $items;
//   }

public function getProductByslugandcolor($productname, $color) {
    // Fetch product with joined color details
    $items = DB::table('products')
        ->leftJoin('category', 'category.id', '=', 'products.category_id')
        ->leftJoin('sub_category', 'sub_category.id', '=', 'products.sub_category_id')
        ->leftJoin('color', 'color.id', '=', 'products.color')
        ->select('products.*', 'color.color as color_name', 'color.color_code','category.category_name','sub_category.sub_category_name')
        ->where('products.slug', $productname)
        ->where('products.color', $color)
        ->first();

    // Handle case where the product is not found
    if (!$items) {
        return null; // Or handle error as required
    }

    // Ensure sizes exist and process them
    if (!empty($items->size)) {
        $sizes = explode(',', $items->size);
        $sizeDetails = [];

        foreach ($sizes as $sizeId) {
            $size = DB::table('size') // Assuming 'sizes' is the correct table for sizes
                ->where('id', $sizeId)
                ->value('size'); // Replace 'name' with the correct field for size name

            if ($size) {
                $sizeDetails[] = $size;
            }
        }

        // Assign size names to the item
        $items->size_name = implode(',', $sizeDetails);
    } else {
        $items->size_name = null; // Or handle as needed
    }

    return $items;
}

  public function get_Product_colors($group){
    $items = DB::table('products')
    ->leftJoin('color','color.id','=','products.color')
    ->select('products.*','color.color as color_name','color.color_code')
    ->where('products.product_group', $group)
    ->where('products.status', "1")
    ->orderBy('products.id', 'DESC')
    // ->limit(200)
    ->get()
    ->toArray();

    // print_r($items);
    // exit;
    return $items;
  }

  public function get_product_prices($id){
    $item=DB::table('products_prices')->where('product_id',$id)->get()->toArray();
    return $item;
  }

  public function createProducts($product_name,$group_code,$category_id,$sub_category_id,$slug,$short_desc,$offer,$offer_type,$qnty,$detail,$group_tag,$video,$created_by,$color,$color_name,$size,$p_price,$old_price,$price){
    $i_status='E';
    $this->products->where('status', "1");
    $this->products->where('category_id', $category_id);
    $this->products->where('product_name', $product_name);
    $this->products->where('color', $color);
    $item=$this->products->first();
    if(empty($item)){
      $user_data=array(

				'product_name'      => $product_name,
                'product_group'     => $group_code,
				'category_id'      => $category_id,
				'sub_category_id'      => $sub_category_id,
				'slug'      => $slug,
				'offer'      => $offer,
				'offer_type'      => $offer_type,
				'short_desc'      => $short_desc,
				'detail'      => $detail,
				'qty'      => $qnty,
				'tags'      => $group_tag,
                'video_url' => $video,
                'color' => $color,
                'color_name' => $color_name,
                'size'  => $size,
                'purchased_price' => $p_price,
                'old_price' => $old_price,
                'price'   => $price,
				'status'      => '1',
                'created_by'      => $created_by,
				'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=$this->products->insertGetId($user_data);
      $i_status=$user_id;
    }else{
      $i_status='A';
    }
    return $i_status;
  }

  public function updateProducts($id,$product_name,$group_code,$category_id,$sub_category_id,$slug,$short_desc,$offer,$offer_type,$qnty,$detail,$group_tag,$video,$updated_by,$color,$color_name,$size,$p_price,$old_price,$price){
    $i_status='E';
    $this->products->where('status', "1");
    $this->products->where('product_group', $group_code);
    $this->products->where('color', $color);
    $this->products->where('id','!=',$id);
    $item=$this->products->get()->first();
    $this->products = DB::table('products');
    if(empty($item)){
      $user_data=array(
        'product_name'      => $product_name,
        'product_group'     => $group_code,
        'category_id'      => $category_id,
        'sub_category_id'      => $sub_category_id,
        'slug'      => $slug,
        'offer'      => $offer,
        'offer_type'      => $offer_type,
        'short_desc'      => $short_desc,
        'detail'      => $detail,
        'qty'      => $qnty,
        'tags'      => $group_tag,
        'video_url' => $video,
        'color' => $color,
        'color_name' => $color_name,
        'size'  => $size,
        'purchased_price' => $p_price,
        'old_price' => $old_price,
        'price'   => $price,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->products->where('products.id', $id);
      if($this->products->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteProducts($id){
    $user_data=array(
      'status'    => 0,
      'slug'      => ""
    );
    $this->products->where('id', $id);
    return $this->products->update($user_data);
  }

  public function delete_Product_image($id){
    $item=DB::table('product_images')->where('id',$id)->delete();
    return $item;
  }


  function imageupload($image_url, $id) {
    $user_data=array(
        'image_url'    => $image_url,
      );
      $this->products->where('id', $id);
      return $this->products->update($user_data);
  }

  function videoupload($image_url, $id) {
    $user_data=array(
        'video_url'    => $image_url,
      );
      $this->products->where('id', $id);
      return $this->products->update($user_data);
  }



  function upload_product_images($image_url, $id) {
    $user_data=array(
        'product_id'  => $id,
        'image_url'    => $image_url,
        'status'    => '1',
        'created_date'      =>date("Y-m-d H:i:s")

      );
    $item = DB::table('product_images')->insertGetId($user_data);
    return $item;
  }


  public function upload_product_imageswithcolor($image_url,$color, $id) {
    $user_data=array(
        'product_id'  => $id,
        'image_url'    => $image_url,
        'color_id'=> $color,
        'status'    => '1',
        'created_date'      =>date("Y-m-d H:i:s")

      );
    $item = DB::table('product_images')->insertGetId($user_data);
    return $item;
  }

  public function addToWishlist($user_id,$product_id){
    $user_data=array(
        'user_id'  => $user_id,
        'product_id'    => $product_id,
        'status' => "1",
        'created_by'      => $user_id,
        'created_date'      =>date("Y-m-d H:i:s")

      );
    $item = DB::table('wishlist')->insertGetId($user_data);
    return $item;
  }

  public function removeWishlist($id){
    $i_status='E';
    $user_data=array(
      'status'    => 0,
    );
    if(DB::table('wishlist')->where('id',$id)->update($user_data)){
        $i_status='S';
    }else{
        $i_status='A';

    }
    return $i_status;
  }

  public function getwishlistcntbyuserid($id){
    $item = DB::table('wishlist')->where('user_id',$id)->where('status','1')->count();
    return $item;
  }

  public function getallwishlist($id){
    $item = DB::table('wishlist')
    ->leftJoin('products','wishlist.product_id','products.id')
    ->select('wishlist.*','products.product_name','products.price','products.old_price','products.offer','products.image_url','products.slug','products.color')
    ->where('wishlist.user_id',$id)
    ->where('wishlist.status','1')
    ->get()->toArray();
    return $item;
  }



  public function getcartByuserid($user_id){
    $result = DB::table('cart')
    ->leftJoin('products','cart.product_id','=','products.id')
    ->select('cart.*')
    ->where('cart.user_id', $user_id)->get()->toArray();
    // print_r($result);
    // exit;
    if (!empty($result)) {
        return array('status' => 'S', 'data' => $result );
        } else {
            return array('status' => 'E', 'data'=>"");

        }
  }

  public function updateDealDetails($id,$dealdt,$deal_price,$start_date,$end_date,$updated_by){
    $i_status='E';
    $user_data=array(
      'daily_deal'    => $dealdt,
      'deal_price'    => $deal_price,
      'start_date'    => $start_date,
      'end_date'    => $end_date,
    );
    if(DB::table('products')->where('id',$id)->update($user_data)){
        $i_status='S';
    }else{
        $i_status='A';
    }
    return $i_status;
  }


  public function add_product_prices($prod_id,$s_price,$p_price,$o_price,$color,$size,$created_by){
    $user_data=array(
        'product_id'    => $prod_id,
        'size'    => $size,
        'color'    => $color,
        'sale_price'    => $s_price,
        'old_price'    => $o_price,
        'purchase_price'    => $p_price,
        'status' => "1",
        'created_by'      => $created_by,
        'created_date'      =>date("Y-m-d H:i:s")

      );
    $item = DB::table('products_prices')->insert($user_data);
    return $item;
  }

  public function delete_product_prices($prod_id){
    $updatedRow = DB::table('products_prices')->where('product_id',$prod_id)->delete();
    if($updatedRow){
        return array('status'=>'S');
    }else{
        return array('status'=>'E');
    }
  }

   public function getsearch($key){
    // $item = DB::table('products')
    // ->where('product_name','LIKE',"%{$key}%")
    // ->orWhere('sku_no','LIKE',"%{$key}%")
    // ->where('status','1')->get()->toArray();

    $item = DB::table('products')
    ->leftJoin('category','category.id','=','products.category_id')
    ->leftJoin('color','color.id','=','products.color')
    ->select('products.*','category.category_name','category.slug as cat_slug','color.color as color_name')

    ->where(function($query) use ($key) {
        $query->where('products.product_name', 'LIKE', "%{$key}%")
              ->orWhere('products.short_desc', 'LIKE', "%{$key}%");
    })
    ->where('products.status', '1')
    ->get()
    ->toArray();


    return $item;
  }



}
