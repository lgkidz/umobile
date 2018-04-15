<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class admin_members_controller extends Controller
{
  public function list(){
    $mems = DB::table('member_tbl')->select('*')->get()->toJson();
    return response()->json(['members'=>$mems]);
  }

  public function ban(Request $req){
    $id = $req->id;
    $ban_status = DB::table('member_tbl')->select('ban')->where('member_id',$id)->first();
    echo $ban_status->ban;
    if($ban_status->ban == 0){
      DB::table('member_tbl')->where('member_id',$id)->update(['ban' => 1]);
    }
    else{
      DB::table('member_tbl')->where('member_id',$id)->update(['ban' => 0]);
    }
    return redirect('/admin/members');
  }
}
