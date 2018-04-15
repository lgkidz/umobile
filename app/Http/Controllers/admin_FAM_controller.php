<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class admin_FAM_controller extends Controller
{
    public function list(){
      $fs = DB::table('feedback_tb')->select('*')->get()->toJson();
      return response()->json(['fs'=>$fs]);
    }

    public function mail(Request $req){
      $mails = $req->to;
      $content = $req->content;
      echo $mails;
      echo "<br>";
      echo $content;
      return redirect('/admin/feedback');
    }
}
