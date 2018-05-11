<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class home_controller extends Controller
{
    public function home(){
      $pros = $this->get_all_products();
      $brands = $this->get_all_brands();
      return view('home',['pros' => $pros,'brands' => $brands]);
    }

    public function get_all_products(){
      $result = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')->get();
      return $result;
    }

    public function get_products_by_brand_name($brand){
      $result = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')->where('brand_tbl.brand_name','=',$brand)->get();
      return $result;
    }

    public function products(){
      $pros = $this->get_all_products();
      $brands = $this->get_all_brands();
      return view('products',['pros' => $pros,'brands' => $brands]);
    }

    public function get_all_brands(){
      $result = DB::table('brand_tbl')->get();
      return $result;
    }

    public function productsbybrand($brand = null){
      $dbbr = DB::table('brand_tbl')->where('brand_name',$brand)->first();
      if($dbbr){
        $pros = $this->get_products_by_brand_name($brand);
        $brands = $this->get_all_brands();
        $curbrand = $brand;
        return view('productsbybrand',['curbrand' => $curbrand, 'pros' => $pros,'brands' => $brands]);
      }
      else{
        return redirect('/products');
      }

    }

    public function get_phone($brand,$id){
      $result = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')->where([['product_tbl.product_id','=',$id],['brand_tbl.brand_name','=',$brand]])->first();
      return $result;
    }

    public function phone($brand = null, $id = null){
      $phone = $this->get_phone($brand,$id);
      if($phone){
        $brands = $this->get_all_brands();
        $curbrand = $brand;
        return view('phone',['curbrand' => $curbrand,'brands' => $brands,'phone' => $phone]);
      }
      else{
        return redirect('/products');
      }
    }

    public function cart(){
      $phones = array();
      if(session('cart') != null){
        foreach (session('cart') as $c) {
          $query = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')->where('product_tbl.product_id',$c)->first();
          array_push($phones,$query);
        }
      }
      $brands = $this->get_all_brands();
      return view('cart',['brands' => $brands,'phones' => $phones]);
    }

    public function checkout(){

      if(session('cart') != null){
        $phones = array();
        foreach (session('cart') as $c) {
          $query = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')->where('product_tbl.product_id',$c)->first();
          array_push($phones,$query);
        }
        $brands = $this->get_all_brands();
        return view('checkout',['brands' => $brands,'phones' => $phones]);
      }
      else{
        return redirect('/');
      }
    }
}
