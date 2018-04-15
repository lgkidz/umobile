<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class admin_orders_controller extends Controller
{
    public function list(){
      $data = DB::table('order_tbl')->join('orderdetails_tbl','order_tbl.order_id','=','orderdetails_tbl.order_id')->join('product_tbl','orderdetails_tbl.product_id','=','product_tbl.product_id')->select('*')->get()->toJson();
      return response()->json(['orders'=>$data]);
    }

    public function changestatus(Request $req){
      $status = $req->status;
      $id = $req->id;

      echo $id;
      echo $status;

      DB::table('order_tbl')->where('order_id',$id)->update(['status' => $status]);
      return redirect('/admin/orders');
    }
}
