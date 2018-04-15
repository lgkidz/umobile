<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class admin_admins_controller extends Controller
{
  public function list(){
    $admins = DB::table('admin_tbl')->select('id','real_name','role','description')->get()->toJson();
    return response()->json(['admins'=>$admins]);
  }
}
