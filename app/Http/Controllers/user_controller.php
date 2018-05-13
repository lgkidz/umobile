<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;
class user_controller extends Controller
{

    public function profilepage(){
      $member_id = session('member_id');
      $member_info = DB::table('member_tbl')->where('member_id',$member_id)->first();
      $brands = $this->get_all_brands();
      $orderlist = $this->getorderlist();
      return view('profile',['brands' => $brands,'mem' => $member_info,'data' => $orderlist]);
    }

    public function get_all_brands(){
      $result = DB::table('brand_tbl')->get();
      return $result;
    }

    public function login(Request $req){
      $email = $req->email;
      $password = $req->password;
      $cur_url = $req->cururl;
      if($cur_url == null){
        $cur_url = '/';
      }
      $user = DB::table('member_tbl')->where('email','=',$email)->first();
      if($user){
        if(sha1($password) == $user->password){
          $req->session()->put('member_id', $user->member_id);
          $req->session()->put('first_name', $user->first_name);
          $req->session()->put('last_name', $user->last_name);
          $req->session()->put('address', $user->address);
          $req->session()->put('phone', $user->phone);
          $req->session()->put('email', $user->email);
          return redirect($cur_url);
        }
        else{
          return redirect('/')->with('loginerr','Mật khẩu không chính xác');
        }
      }
      else{
        return redirect('/')->with('loginerr','Tài khoản không tồn tại');
      }
    }

    public function signup(Request $req){
      $name = $req->name;
      $email = $req->email;
      $password = $req->password;

      $exist = $this->checkexist($email);
      if(!$exist){
        $arrname = explode(" ",$name,2);
        $first_name = $arrname[0];
        $last_name = $arrname[1];
        $encryptedpass = sha1($password);

        $id = DB::table('member_tbl')->insertGetId(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password' => $encryptedpass]);

        $req->session()->put('member_id', $id);
        $req->session()->put('first_name', $first_name);
        $req->session()->put('last_name', $last_name);
        $req->session()->put('email', $email);
        return redirect('/profile');
      }
      else{
        return redirect('/')->with('signuperr','Email đã được đăng ký');
      }
    }

    public function checkexist($email){
      $result = DB::table('member_tbl')->where('email','=',$email)->first();
      if($result){
        return true;
      }
      return false;
    }

    public function editInfo(){
      $data = request()->all();
      $gender = $data['gender'];
      $address = $data['address'];
      $phone = $data['phone'];
      $first_name = $data['fname'];
      $last_name = $data['lname'];
      $member_id = session('member_id');
      session()->put('first_name', $first_name);
      session()->put('last_name', $last_name);
      session()->put('address', $address);
      session()->put('phone', $phone);
      $image_path = "";
      if(isset($data['avatar'])){
        $imagename =  $data['avatar']->getClientOriginalName();
        $data['avatar']->storeAs('public/uploads',$imagename);
        $image_path = 'uploads/'. $imagename;
        DB::table('member_tbl')->where('member_id',$member_id)
                               ->update(['avatar' => $image_path,'first_name' => $first_name,'last_name' => $last_name,'gender' => $gender,'address' => $address,'phone' => $phone]);
      }
      else{
        DB::table('member_tbl')->where('member_id',$member_id)
                               ->update(['first_name' => $first_name,'last_name' => $last_name,'gender' => $gender,'address' => $address,'phone' => $phone]);
      }

      $user = DB::table('member_tbl')->where('member_id',$member_id)->select('avatar','first_name','last_name','phone','address','gender')->get()->toJson();
      return response()->json(['mem' => $user]);
    }

    public function getorderlist(){
      $email = session('email');
      $result = DB::table('order_tbl')->join('orderdetails_tbl','orderdetails_tbl.order_id','=','order_tbl.order_id')
                                         ->join('product_tbl','product_tbl.product_id', '=', 'orderdetails_tbl.product_id')
                                         ->join('brand_tbl','product_tbl.brand_id','=','brand_tbl.brand_id')
                                         ->select('orderdetails_tbl.order_id','order_tbl.created_date','order_tbl.customer_name','order_tbl.address','order_tbl.phone','order_tbl.status','orderdetails_tbl.price','orderdetails_tbl.quantity','product_tbl.product_name','brand_tbl.brand_name')
                                         ->where('order_tbl.email',$email)
                                         ->get();
      return $result;
    }

    public function feedback(){
      $email = session('email');
      $name = session('first_name') . " " . session('last_name');
      $data = request()->all();
      $content = $data['content'];
      DB::table('feedback_tb')->insert(['pen_name' => $name, 'email' => $email, 'content' => $content]);
      return response()->json('success');
    }

    public function logout(){
      session()->flush();
      return redirect("/");
    }
}
