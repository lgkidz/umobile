<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class admin_controller extends Controller
{
    public function check_authority(){
      if(session("admin_id")){
        $mems = DB::table('member_tbl')->select('*')->orderBy('member_id', 'desc')->limit(8)->get();
        $orders = DB::table('order_tbl')->join('orderdetails_tbl','order_tbl.order_id','=','orderdetails_tbl.order_id')->join('product_tbl','orderdetails_tbl.product_id','=','product_tbl.product_id')->select('*')->limit(7)->get();
        $prod = DB::table('orderdetails_tbl')->join('product_tbl','orderdetails_tbl.product_id','=','product_tbl.product_id')->select('product_tbl.product_name','product_tbl.price')->groupBy('orderdetails_tbl.product_id')->orderByRaw('count(orderdetails_tbl.product_id) DESC')->limit(1)->get();
        return redirect('/admin/dashboard',['mems' => $mems,'data' => $orders,'prod' => $prod]);
      }
      else{
        return view('admin.login');
      }
    }
    public function check_path($path){
      if(session("admin_id")){
        if($path == 'dashboard'){
          $mems = DB::table('member_tbl')->select('*')->orderBy('member_id', 'desc')->limit(8)->get();
          $orders = DB::table('order_tbl')->join('orderdetails_tbl','order_tbl.order_id','=','orderdetails_tbl.order_id')->join('product_tbl','orderdetails_tbl.product_id','=','product_tbl.product_id')->select('*')->limit(7)->get();
          $prod = DB::table('orderdetails_tbl')->join('product_tbl','orderdetails_tbl.product_id','=','product_tbl.product_id')->select('product_tbl.image','product_tbl.product_name','product_tbl.price')->groupBy('orderdetails_tbl.product_id')->orderByRaw('count(orderdetails_tbl.product_id) DESC')->limit(1)->get();
          return view('admin.dashboard',['mems' => $mems,'data' => $orders,'prod' => $prod]);
        }
        else{
          return view('admin.'.$path);
        }
      }
      else{
        return redirect('/admin');
      }
    }



	public function admin_login(Request $req){

      $input_username = $req->input('username');
      $input_password = $req->input('password');

      $password_check = DB::table('admin_tbl')->select('password')
                                   ->where('username','=',$input_username)
                                   ->first();

      if($password_check && sha1($input_password) == $password_check->password){
        $admin = DB::table('admin_tbl')->select('id','username','role','real_name','description')
                                     ->where('username','=',$input_username)
                                     ->first();
        session(['admin_id' => $admin->id]);
        session(['admin_username' => $admin->username]);
        session(['admin_role' => $admin->role]);
        session(['admin_real_name' => $admin->real_name]);
        session(['admin_description' => $admin->description]);
      }
        return redirect("/admin");
	}

  public function admin_logout(){
    session()->flush();
    return redirect("/admin");
  }

}
