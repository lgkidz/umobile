<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class admin_brands_controller extends Controller
{
    public function list(){
      $brands = DB::table('brand_tbl')->select('*')->get()->toJson();
      return response()->json(['brands'=>$brands]);
    }

    public function edit(){
      $data = request()->all();
      $id = $data['id'];
      $new_value = $data['value'];
      DB::table('brand_tbl')->where('brand_id',$id)->update(['brand_name' => $new_value]);
      return $this->list();
    }

    public function insert(Request $req){
      $brand = $req->brand_name;
      DB::table('brand_tbl')->insert(['brand_name' => $brand]);
      return redirect('/admin/brands');
    }

    public function delete(Request $req){
      DB::table('brand_tbl')->where('brand_id',$req->deleteid)->delete();
      return redirect('/admin/brands');
    }
}
