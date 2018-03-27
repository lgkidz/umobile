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

  public function list_product(){
    $brands = DB::table('brand_tbl')->select('*')->get()->toJson();
    $result = DB::table('product_tbl')->join('brand_tbl','product_tbl.brand_id','brand_tbl.brand_id')
                                      ->select('product_tbl.*','brand_tbl.brand_name')
                                      ->get()->toJson();
    return response()->json(['products'=>$result, 'brands'=>$brands]);
  }

  public function addproduct(Request $req){
    $brand_id = $req->input('brand');
    $name = $req->input('name');
    $quantity = $req->input('quantity');
    $price = $req->input('price');
    $cpu = $req->input('cpu');
    $ram = $req->input('ram');
    $internal = $req->input('internal');
    $external = $req->input('external');
    $camera = $req->input('camera');
    $battery = $req->input('battery');
    $sim = $req->input('sim');
    $colors = array();
    foreach($req->input('color') as $c){
      array_push($colors,$c);
    }
    $ava = $req->avatar;
    $req->avatar->storeAs('images/products', $ava);
    //$ava_name = $req->avatar->path();
    $x = array($brand_id,$name,$quantity,$price,$cpu,$ram,$internal,$external,$camera,$battery,$sim,$colors,$ava);
    echo '<pre>';
    var_dump($x);
  }
}
