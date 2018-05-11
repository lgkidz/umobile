<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class order_controller extends Controller
{
    public function addtocart(){
      $data = request()->all();
      $id = $data['id'];
      session()->push('cart', $id);
      return response()->json($id);
    }

    public function removefromcart(){
      $data = request()->all();
      $id = $data['id'];
      session()->put('cart',array_diff(session('cart'), array($id)));
      $totalp = 0;
      foreach (session('cart') as $c) {
        $query = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')->where('product_tbl.product_id',$c)->first();
        $totalp += $query->price;
      }
      return response()->json(['size' => sizeof(session('cart')), 'totalp' => number_format($totalp)]);
    }

    public function checkout(Request $req){
      if(session('cart') != null){
        $name = $req->name;
        $phone = $req->phone;
        $address = $req->address;
        $email = $req->email;
        if(session('member_id') != null){
          $email = session('email');
        }

        $orderId = DB::table('order_tbl')->insertGetId(['email' => $email, 'phone' => $phone, 'address' => $email, 'customer_name' => $name]);
        foreach (session('cart') as $c) {
          $query = DB::table('product_tbl')->where('product_tbl.product_id',$c)->first();
          DB::table('orderdetails_tbl')->insert(['order_id' => $orderId,'product_id' => $c,'price' => $query->price,'quantity' => '1','cut_off' => '0']);
        }
        session()->forget('cart');
        return redirect('/')->with('checks','Tạo đơn hàng thành công!');
      }
      else{
        return redirect('/');
      }

    }
}
