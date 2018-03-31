<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class admin_products_controller extends Controller
{
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
    $description = $req->input('description');
    if(!$description){
      $description = "";
    }
    $colors = "";
    foreach($req->input('color') as $c){
      $colors .= $c;
      $colors .= ',';
    }
    $image_path = "";
    if($req->hasFile('imagex')){
      $imagename =  $req->imagex->getClientOriginalName();
      $req->imagex->storeAs('public/products',$imagename);
      $image_path = 'products/'. $imagename;
    }
    else {
      return 'nope';
    }
    DB::table('product_tbl')->insert(
      [
        'product_name' => $name,
        'image' => $image_path,
        'price' => $price,
        'brand_id' => $brand_id,
        'description' => $description,
        'quantity' => $quantity,
        'color' => $colors,
        'cpu' => $cpu,
        'ram' => $ram,
        'internal' => $internal,
        'external' => $external,
        'camera' => $camera,
        'battery' => $battery,
        'sim' => $sim
      ]
    );
    return redirect('/admin/products');
  }

  public function editproduct(Request $req){
    $product_id = $req->input('id');
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
    $description = $req->input('eddescription');
    if(!$description){
      $description = "";
    }
    $colors = "";
    foreach($req->input('color') as $c){
      $colors .= $c;
      $colors .= ',';
    }

    $image_path = "";
    if($req->hasFile('imagex')){
      $imagename =  $req->imagex->getClientOriginalName();
      $req->imagex->storeAs('public/products',$imagename);
      $image_path = 'products/'. $imagename;
      DB::table('product_tbl')->where('product_id',$product_id)->update(
        [
          'product_name' => $name,
          'image' => $image_path,
          'price' => $price,
          'brand_id' => $brand_id,
          'description' => $description,
          'quantity' => $quantity,
          'color' => $colors,
          'cpu' => $cpu,
          'ram' => $ram,
          'internal' => $internal,
          'external' => $external,
          'camera' => $camera,
          'battery' => $battery,
          'sim' => $sim
        ]
      );
    }
    else {
      DB::table('product_tbl')->where('product_id',$product_id)->update(
        [
          'product_name' => $name,
          'price' => $price,
          'brand_id' => $brand_id,
          'description' => $description,
          'quantity' => $quantity,
          'color' => $colors,
          'cpu' => $cpu,
          'ram' => $ram,
          'internal' => $internal,
          'external' => $external,
          'camera' => $camera,
          'battery' => $battery,
          'sim' => $sim
        ]
      );
    }
    return redirect('/admin/products');
  }
  public function deleteproduct(Request $req){
    $id = $req->deleteid;
    $product_image = DB::table('product_tbl')->select('image')->where('product_id' , '=' , $id)->get();
    $image_path = "public/" . $product_image[0]->image;
    Storage::delete($image_path);
    DB::table('product_tbl')->where('product_id',$req->deleteid)->delete();
    return redirect('/admin/products');
  }

}
