<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class admin_controller extends Controller
{
    public function check_authority(){
      if(session("admin_id")){
        return redirect('/admin/dashboard');
      }
      else{
        return view('admin.login');
      }
    }
    public function check_path($path){
      if(session("admin_id")){
        return view('admin.'.$path);
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
