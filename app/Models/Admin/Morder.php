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

class Morder extends Model
{
  private $order=null;
  protected $db;
  private $helper;
  public function __construct(){
    $this->helper = new Helper();
    $this->order = DB::table('orders');
  }
  public function getorderListGt($order, $status, $limit, $offset){
    $this->order->select('*');
    $this->order->selectRaw('COUNT(*) OVER() as total_size');
    $this->order->orderBy('created_at', 'DESC');
    if($limit)
    $this->order->limit($limit);
    if($offset)
    $this->order->offset($offset);
    $item=$this->order->get()->toArray();
    return $item;
  }

  public function getorderListDt($postData=null){
    $totalData =DB::table('orders')->where('status',"1")->count();
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
    $posts = DB::table('orders')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('order')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('invoice_number', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('orders')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('invoice_number', 'LIKE',"%{$search}%")

            ->count();
    }
    $data = array();
    foreach($posts as $record ){

        $userdetails = DB::table('users')->where('id',$record->user_id)->first();
        if (empty($userdetails)) {
            $fullname = "";
        }else{
            $fullname = $userdetails->first_name.' '.$userdetails->last_name;
        }

      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"order_number"=>$record->invoice_number,
                "fullname"=>$fullname,
                "qty"=>$record->total_quantity,
                "total_amount"=>$record->total_amount,
                "tax_amount"=>$record->tax_amount,
                "net_amount"=>$record->net_amount,
                // "payment"=>$record->payment,
                "order_status"=>$record->order_status,
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

  public function getorderListDtbyStatus($postData=null, $data){
    $totalData =DB::table('orders')->where('status',"1") ->whereIn('order_status',$data)->count();
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
    $posts = DB::table('orders')
    ->where('status',"1")
    ->whereIn('order_status',$data)
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('orders')
            ->where('status',"1")
            ->whereIn('order_status',$data)
            ->orWhere('id', 'LIKE',"%{$search}%")
			->orWhere('invoice_number', 'LIKE',"%{$search}%")


            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('orders')
            ->where('status',"1")
            ->whereIn('order_status',$data)
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('invoice_number', 'LIKE',"%{$search}%")


            ->count();
    }
    $data = array();
    foreach($posts as $record ){

        $userdetails = DB::table('users')->where('id',$record->user_id)->first();
        if (empty($userdetails)) {
            $customername = "";
        }else{
            $customername = $userdetails->first_name.' '.$userdetails->last_name;
        }

        $shippingDt = DB::table('order_shipping_address')->where('order_id',$record->id)->first();

        if (empty($shippingDt)) {
            $fullname = "";
        }else{
            $fullname = $shippingDt->fullname;
        }

      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"order_number"=>$record->invoice_number,
                "fullname"=>$fullname,
                "qty"=>$record->total_quantity,
                "total_amount"=>$record->total_amount,
                "tax_amount"=>$record->tax_amount,
                "net_amount"=>$record->net_amount,
                "order_status"=>$record->order_status,
                "pay_status"=>$record->payment_status,
                "awb_no"=>$record->awb_no ?? "",
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

  public function getorderListById($id){
    $item = DB::table('orders')->where('id',$id)->first();

    if(!empty($item)){

        $data = DB::table('order_items')
        ->leftJoin('products','order_items.product_id','products.id')
        ->leftJoin('color','order_items.color','color.id')
        ->select('order_items.*','products.image_url','color.color as color_name')
        ->where('order_items.order_id',$id)->get()->toArray();


        $addressDt = DB::table('order_shipping_address')
        ->leftJoin('country','order_shipping_address.country','country.country_id')
        ->leftJoin('state','order_shipping_address.state','state.state_id')
        ->leftJoin('city','order_shipping_address.city','city.city_id')
        ->select('order_shipping_address.*','city.city_name','country.country_name','state.state_name')
        ->where('order_shipping_address.order_id',$id)->first();
        $customerDt = DB::table('users')->where('id',$item->user_id)->first();

        $customerDt->fullname = $customerDt->first_name.' '.$customerDt->last_name;

        $item->data = $data;
        $item->address = $addressDt;
        $item->customer = $customerDt ;
    }else{
        $item->data = [];
        $item->address = "";
        $item->customer = "";

    }

    return $item;
  }


  public function updateorder($id,$order_name,$updated_by){
    $i_status='E';
    $this->order->where('status', "1");
    $this->order->where('order_name', $order_name)->where('id','!=',$id);
    $item=$this->order->get()->first();
    $this->order = DB::table('orders');
    if(empty($item)){
      $user_data=array(
        'order_name'      => $order_name,
				'updated_by'      => $updated_by,
				'updated_date'      =>date("Y-m-d H:i:s")
      );
      $this->order->where('orders.id', $id);
      if($this->order->update($user_data)){
        $i_status=$id;
      }
    }else{
      $i_status=false;
    }
    return $i_status;
  }

  public function deleteorder($id){
    $user_data=array(
      'status'    => 0,
    );
    $this->order->where('id', $id);
    return $this->order->update($user_data);
  }


  public function getAllorder(){
    $this->order->select('*')->where('status',"1");
    $this->order->orderBy('id', 'DESC');
    $this->order->limit(1000);
    $item=$this->order->get()->toArray();
    return $item;
  }

  public function getReviewListDt($postData=null){
    $totalData =DB::table('reviews')->where('status',"1")->count();
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
    $posts = DB::table('reviews')
    ->where('status',"1")
        ->offset($start)
        ->limit($limit)
        ->orderBy($column,$dir)
        ->get();
    } else {
    $search = $searchValue;
    $posts =  DB::table('reviews')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('ratings', 'LIKE',"%{$search}%")

            ->offset($start)
            ->limit($limit)
            ->orderBy($column,$dir)
            ->get();

    $totalFiltered = DB::table('reviews')
            ->where('status',"1")
            ->orWhere('id', 'LIKE',"%{$search}%")
						->orWhere('ratings', 'LIKE',"%{$search}%")

            ->count();
    }
    $data = array();
    foreach($posts as $record ){

        $users = DB::table('users')->where('id', $record->user_id)->first();
        if (empty($users)) {
            $fullname = "-";
        } else {
            $fullname = $users->first_name.' '.$users->last_name ;
        }

        $products = DB::table('products')->where('id', $record->product_id)->first();
        if (empty($products)) {
            $productname = "-";
        } else {
            $productname = $products->product_name ;
        }




      $data[] = array(
        "list_id"=>$this->helper->encodeData($record->id),
				"id"=>$record->id,
				"product_id"=>$productname,
				"user_id"=>$fullname,
				"ratings"=>$record->ratings,
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





  public function updateOrderStatus($id,$payment,$order_status,$delivery_status,$updated_by){
    $user_data=array(
        'payment_status' => $payment,
        'order_status'    => $order_status,
        'delivery_status'    => $delivery_status,
        'updated_by'      => $updated_by,
        'updated_date'      =>date("Y-m-d H:i:s")
      );
  $this->order->where('id', $id);
  return $this->order->update($user_data);
}

  public function updateOrderCurrentStatus($id,$order_status,$delivery_status,$updated_by){
    $user_data=array(
        'order_status'    => $order_status,
        'delivery_status' =>$delivery_status,
        'updated_by'      => $updated_by,
        'updated_date'      =>date("Y-m-d H:i:s")
      );
  $this->order->where('id', $id);
  return $this->order->update($user_data);
  }

  public function addToCart($user_id,$product_id,$product_name,$product_price,$session_id,$size,$color,$combo,$data){
    $userrecords = DB::table('cart')->where('session_id', $session_id)->first();
    if (empty($userrecords)) {
      $user_data=array(
        'user_id'      => $user_id,
        'product_id'      => $product_id,
        'session_id'      => $session_id,
        'product_name'      => $product_name,
        'combo'             => $combo,
        'size'              => $size,
        'color'             => $color,
        'data'              => $data,
        'quantity'      => "1",
        'price'      => $product_price,
        'quantity_price'   => $product_price,
        'status'      => "1",
        'created_by'      => $user_id,
        'created_date'      =>date("Y-m-d H:i:s")
      );
      $user_id=DB::table('cart')->insertGetId($user_data);
    }else{
      $records = DB::table('cart')->where('session_id', $session_id)->where('product_id', $product_id)->first();
      if (!empty($records)) {
        $quantity = $records->quantity + 1;
        $quantity_price = $records->price * $quantity;
        $val = array(
          'quantity'=>$quantity,
          'quantity_price'=>$quantity_price,
          'updated_by'=>$user_id,
          'updated_date' =>date("Y-m-d H:i:s")
                    );
        DB::table('cart')->where('cart_id', $records->cart_id)->update($val);


      }else{
        $user_data=array(
          'user_id'      => $user_id,
          'product_id'      => $product_id,
          'session_id'      => $session_id,
          'product_name'      => $product_name,
          'combo'             => $combo,
          'size'              => $size,
          'color'             => $color,
          'data'              => $data,
          'quantity'      => "1",
          'price'      => $product_price,
          'quantity_price'   => $product_price,
          'status'      => "1",
          'created_by'      => $user_id,
          'created_date'      =>date("Y-m-d H:i:s")
        );
        $user_id=DB::table('cart')->insertGetId($user_data);
      }
    }
    $result = DB::table('cart')->where('session_id', $session_id)->get();
    if (!empty($result)) {
            return array('status' => 'S', 'data' => $result);
        } else {
            return array('status' => 'E');
        }
}


  public function removecart($session_id,$product_id){
    $records = DB::table('cart')->where('session_id', $session_id)->where('product_id', $product_id)->first();
    if (!empty($records)) {
      $quantity = $records->quantity - 1;
      $quantity_price = $records->price * $quantity;
      if($quantity == "0"){
        DB::table('cart')->where('cart_id', $records->cart_id)->delete();
        // return array('status' => 'S');
      }else{
        $val = array(
          'quantity'=>$quantity,
          'quantity_price'=>$quantity_price,
          'updated_date' =>date("Y-m-d H:i:s")
                    );
        DB::table('cart')->where('cart_id', $records->cart_id)->update($val);
        // return array('status' => 'S');

      }


      $result = DB::table('cart')->where('session_id', $session_id)->get()->toArray();
      if (!empty($result)) {
              return array('status' => 'S', 'data' => $result);
          } else {
              return array('status' => 'A', 'data'=> "");
          }

    }else{
      return array('status' => 'E');
    }
  }

  public function addQuantityinCart($cart_id, $prod_id){
    $checkProductExist=DB::table('cart')->where('cart_id', $cart_id)->where('product_id', $prod_id)->where('status',"1")->first();

    if(!empty($checkProductExist)) {
        $cart_pro_id = $checkProductExist->cart_id;
        $quantity = $checkProductExist->quantity + 1;
        $quantity_price = $checkProductExist->price * $quantity;
        $updated_by = $checkProductExist->user_id;
        $i_data=array(
            'quantity' => $quantity,
            'quantity_price' => $quantity_price,
            'status' => 1,
            'updated_by' =>$updated_by,
            'updated_date' => date("Y-m-d H:i:s")
        );

        if(DB::table('cart')->where('cart_id', $cart_pro_id)->update($i_data)){
            return array('status'=>'S');
        }else{
            return array('status'=>'E');
        }
    }
  }

  public function removeQuantityinCart($cart_id, $prod_id){
    $checkProductExist=DB::table('cart')->where('cart_id', $cart_id)->where('product_id', $prod_id)->where('status',"1")->first();

    if(!empty($checkProductExist)){
        if($checkProductExist->quantity==1) {

            $updatedRow =  DB::table('cart')->where('cart_id',$checkProductExist->cart_id)->delete();
            if($updatedRow){
                return array('status'=>'S','product_id'=>$checkProductExist->product_id,'user_id'=>$checkProductExist->user_id);
            }else{
                return array('status'=>'E');
            }
        }else{
            $cart_pro_id = $checkProductExist->cart_id;
            $quantity = $checkProductExist->quantity - 1;
            $quantity_price = $checkProductExist->price * $quantity;
            $updated_by = $checkProductExist->user_id;
            $i_data=array(
                'quantity' => $quantity,
                'quantity_price' => $quantity_price,
                'status' => 1,
                'updated_by' =>$updated_by,
                'updated_date' => date("Y-m-d H:i:s")
            );

            if(DB::table('cart')->where('cart_id', $cart_pro_id)->update($i_data)){
                return array('status'=>'S');
            }else{
                return array('status'=>'E');
            }
        }
    }
  }

   public function createOrder($session_id,$invoice_num,$user_id,$order_status,$delivery_status,$order_notes,$coupon_discount,$applied_coupon_code,$shipping){

    $result = DB::table('cart')->where('session_id', $session_id)->get()->toArray();
    if (!empty($result)) {



        $taxamt = "0.00";

        // foreach ($result as $key => $value) {
        //     $taxamt += $value->taxamount ;
        // }



      $total_product =DB::table('cart')->where('session_id',$session_id)->sum('quantity');
      $price = DB::table('cart')->where('session_id',$session_id)->sum('price');
    //   $taxamt = $price - ($price * (100/(100+5)));
      $total_price = $price - $coupon_discount + $shipping;
      $netamt = $price;

        $user_data=array(
          'total_quantity'      => $total_product,
          'total_amount' => $total_price,
          'net_amount' => $netamt,
          'shipping_charge' => $shipping,
          'coupon'    => $applied_coupon_code,
          'coupon_value' => $coupon_discount,
          'tax_amount' => $taxamt,
          'tax_perc' => 5,
          'invoice_number'      => $invoice_num,
          'user_id'      => $user_id,
          'order_status'      => $order_status,
          'order_notes'      => $order_notes,
          'status'      => "1",
          'delivery_status'      => $delivery_status,
          'cart_session_id' => $session_id,
          'created_by'      => $user_id,
          'created_date'      =>date("Y-m-d H:i:s")
        );
        $order_id=$this->order->insertGetId($user_data);


      foreach($result as $record){

        $val=array(
          'order_id' => $order_id,
          'product_id'      => $record->product_id,
          'user_id'      => $record->user_id,
          'product_name'      => $record->product_name,
          'combo'      => $record->combo,
          'size'                =>$record->size,
          'color'               =>$record->color,
          'data'               =>$record->data,
          'price'      => $record->price,
          'quantity'      => $record->quantity,
          'quantity_price'      => $record->quantity_price,
          'status'      => "1",
          'created_by'      => $user_id,
          'created_date'      =>date("Y-m-d H:i:s")
        );
        $user_id= DB::table('order_items')->insertGetId($val);

      }
      DB::table('cart')->where('session_id', $session_id)->delete();
      return array('status' => 'S', 'order_id' => $order_id,'price' => $total_price);
    }else{
      return array('status' => 'A');
    }

}

public function createOrdersShippingAddress($order_id,$fullname,$address,$city,$country,$postcode,$mobile,$state,$landmark) {

    $i_data=array(
        'order_id' => $order_id,
        'fullname' => $fullname,
        'address' => $address,
        'landmark' => $landmark,
        'phone' => $mobile,
        'state'=>$state,
        'country' => $country,
        'city' => $city,
        'zipcode' => $postcode,
        'status' => 1,
        'created_date' => date("Y-m-d H:i:s"),
    );

    if(DB::table('order_shipping_address')->insert($i_data)){
        return array('status'=>'S');
    }else{
        return array('status'=>'E');
    }
//}
}

public function getorderByuserid($user_id){
    $result = DB::table('orders')
    ->where('orders.user_id', $user_id)
    ->get()->toArray();
    if (!empty($result)) {
            return array('status' => 'S', 'data' => $result);
        } else {
            return array('status' => 'E');
        }
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

  public function getcart($session_id){
    $result = DB::table('cart')
    ->leftJoin('products','cart.product_id','=','products.id')
    ->leftJoin('color','cart.color','=','color.id')
    ->select('cart.*','color.color as color_name','products.image_url','products.slug','products.color as prod_color')
    ->where('cart.session_id', $session_id)->get()->toArray();
    if (!empty($result)) {
            return array('status' => 'S', 'data' => $result);
        } else {
            return array('status' => 'E');
        }
  }

  public function inserttransaction($user_id,$order_id,$payment_id,$prices,$payment_status){
    $i_data=array(
        'order_id' => $order_id,
            'user_id' => $user_id,
            'amount' => $prices,
            'payment_request_id' => $payment_id,
            'payment_status' => $payment_status,
            'payment_type'=>"online",
            'status' => 1,
            'created_by' => $user_id,
            'transaction_date' => date("Y-m-d H:i:s"),
            'created_date' => date("Y-m-d H:i:s")
    );

    if(DB::table('order_transaction')->insert($i_data)){
        return array('status'=>'S');
    }else{
        return array('status'=>'E');
    }
  }


public function updateTransaction($order_id,$payment_id,$payment_status){
    $user_data=array(
        'payment_status'    => $payment_status,
        'payment_id'        => $payment_id
      );

  return DB::table('order_transaction')->where('order_id',$order_id)->update($user_data);
}

public function awbUpdate( $order_id,$courier,$awb,$tracking_url){
    $user_data=array(
        'awb_no'    => $awb,
        'courier_name'        => $courier,
        'track_url'            => $tracking_url
      );
      return DB::table('orders')->where('id',$order_id)->update($user_data);
}









}
