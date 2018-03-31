<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Products</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@include('admin.jsandcss')
<style>
#contextmenu{
  width: 200px;
  background: white;
  height: auto;
  box-shadow: 2px 2px 2px 0 grey;
  z-index: 99 !important;
  position: absolute;
  display: none;
  border: 1px solid #ccc;
}
.context-menu ul{
  list-style: none;
  padding: 5px 0px 5px 0px;
}
.context-menu ul li{
  padding: 10px 0px 10px 25px;
  cursor: pointer;
}
.context-menu ul li:hover{
  background: #eee;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('admin.includes.header')
  @include('admin.includes.sidemenu')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Products
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
      </ol>
    </section>
    <section class="content">

<!---------------------------------context menu and modal----------------------------------------->

      <div id="contextmenu" class="context-menu">
        <ul>
          <li id="edit_link" data-toggle="modal" data-target="#myModal">Edit this one</li>
          <li id="delete_link">Delete this one</li>
        </ul>
      </div>
      <!-- modal-->
      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" enctype="multipart/form-data" action="{{URL::action('admin_products_controller@editproduct')}}">
            {{ csrf_field() }}
            <input class="form-control" type="hidden" name="id" id="edid" required>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="brand">Brand</label>
              <select class="form-control" name="brand" id="edbrands" required>
                <option value="">zz</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" type="text" name="name" id="edname" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input class="form-control" type="number" min="0" name="quantity" id="edquantity" required>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input class="form-control" type="number" min="0" name="price" id="edprice" required>
            </div>
            <div class="form-group">
              <label>Available Color</label>
              <div class="checkbox">
                <label class="checkbox-inline"><input id="white" type="checkbox" name="color[]" value="white">White</label>
                <label class="checkbox-inline"><input id="black" type="checkbox" name="color[]" value="black">Black</label>
                <label class="checkbox-inline"><input id="red" type="checkbox" name="color[]" value="red">Red</label>
                <label class="checkbox-inline"><input id="blue" type="checkbox" name="color[]" value="blue">Blue</label>
                <label class="checkbox-inline"><input id="purple" type="checkbox" name="color[]" value="purple">Purple</label>
                <label class="checkbox-inline"><input id="silver" type="checkbox" name="color[]" value="silver">Silver</label>
                <label class="checkbox-inline"><input id="gold" type="checkbox" name="color[]" value="gld">Gold</label>
                <label class="checkbox-inline"><input id="pink" type="checkbox" name="color[]" value="pink">Pink</label>
              </div>
            </div>
            <div class="form-group">
              <label for="cpu">Cpu</label>
              <input class="form-control" type="text" name="cpu" id="edcpu" required>
            </div>
            <div class="form-group">
              <label for="ram">Ram</label>
              <input class="form-control" type="text" name="ram" id="edram" required>
            </div>
            <div class="form-group">
              <label for="internal">Internal</label>
              <input class="form-control" type="text" name="internal" id="edinternal" required>
            </div>
            <div class="form-group">
              <label for="external">External</label>
              <input class="form-control" type="text" name="external" id="edexternal" required>
            </div>
            <div class="form-group">
              <label for="camera">Camera</label>
              <input class="form-control" type="text" name="camera" id="edcamera" required>
            </div>
            <div class="form-group">
              <label for="battery">Battery</label>
              <input class="form-control" type="text" name="battery" id="edbattery" required>
            </div>
            <div class="form-group">
              <label for="sim">Sim</label>
              <input class="form-control" type="text" name="sim" id="edsim" required>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" rows="5" name="eddescription" id="eddescription"></textarea>
            </div>
            <div class="form-group">
              <div class="col-md-12 col-xs-12 col-lg-12">
                <label>Product Image:</label>
                <input type="file" name="imagex" onchange="loadFilemodal(event)">
              </div>
              <img id="edoutput" style="width:90%; height:80%" class="thumbnail">
            </div>
          </div>
          <div class="modal-footer">
            <input id="edit_submit" type="submit" class="btn btn-default" value="sumbit">
          </div>
        </form>
        </div>
      </div>
    </div>

<!---------------------------------END context menu and modal----------------------------------------->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <form action="{{URL::action('admin_products_controller@addproduct')}}" method="post" enctype="multipart/form-data">
      <div class="box-header with-border">
        <h3 class="box-title">Add a product</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="brand">Brand</label>
                <select class="form-control" name="brand" id="brands" required>
                  <option value="">zz</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
              </div>
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" type="number" min="0" name="quantity" id="quantity" required>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="number" min="0" name="price" id="price" required>
              </div>
              <div class="form-group">
                <label>Available Color</label>
                <div class="checkbox">
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="white">White</label>
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="black">Black</label>
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="red">Red</label>
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="blue">Blue</label>
                </div>
                <div class="checkbox">
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="purple">Purple</label>
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="silver">Silver</label>
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="gld">Gold</label>
                  <label class="checkbox-inline"><input type="checkbox" name="color[]" value="pink">Pink</label>
                </div>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label for="cpu">Cpu</label>
                <input class="form-control" type="text" name="cpu" id="cpu" required>
              </div>
              <div class="form-group">
                <label for="ram">Ram</label>
                <input class="form-control" type="text" name="ram" id="ram" required>
              </div>
              <div class="form-group">
                <label for="internal">Internal</label>
                <input class="form-control" type="text" name="internal" id="internal" required>
              </div>
              <div class="form-group">
                <label for="external">External</label>
                <input class="form-control" type="text" name="external" id="external" required>
              </div>
              <div class="form-group">
                <label for="camera">Camera</label>
                <input class="form-control" type="text" name="camera" id="camera" required>
              </div>
              <div class="form-group">
                <label for="battery">Battery</label>
                <input class="form-control" type="text" name="battery" id="battery" required>
              </div>
              <div class="form-group">
                <label for="sim">Sim</label>
                <input class="form-control" type="text" name="sim" id="sim" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <img id="output" style="width:90%; height:80%" class="thumbnail">
                <div class="col-md-12 col-xs-12 col-lg-12">
                  <label>Product Image:</label>
                  <input type="file" name="imagex" onchange="loadFile(event)" required>

                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="box-footer">
        <div class="form-group pull-left">
          <input class="btn btn-warning" type="reset" value="reset">
        </div>
        <div class="form-group pull-right">
          <input class="btn btn-info" type="submit" value="Submit">
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">All Products</h3>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Brand</th>
              <th>Image</th>
              <th>Color</th>
              <th>Specs</th>
              <th>Price</th>
              <th>Description</th>
              <th>Quantity In Stock</th>
            </tr>
            </thead>
            <tbody id="products_table">
            </tbody>
            <tfoot>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Brand</th>
              <th>Image</th>
              <th>Color</th>
              <th>Specs</th>
              <th>Price</th>
              <th>Description</th>
              <th>Quantity In Stock</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>
  </div>
  @include('admin.includes.footer')
</div>
<script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>

</script>
<script>
var tabledata;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var original_table_data = "";
function set_original_table_data(data){
  original_table_data = data;
}
$(document).ready(function(){
              $.ajax({
                 type:'POST',
                 url:'/admin/products/list_product',
                 data:'z',
                 success:function(data){
                   //console.log(data);
                   tabledata = JSON.parse(data.products);
                   set_original_table_data(tabledata);
                   getbrands(JSON.parse(data.brands));
                    filltable(tabledata);

                 }
              });
});

function getbrands(data){
  var options = "";
  var modaloptions = "";
  for(var i = 0;i<data.length;i++){
    options += '<option value="' + data[i].brand_id + '">' + data[i].brand_name + '</option>';
    modaloptions += '<option id="'+ data[i].brand_name +'" value="' + data[i].brand_id + '">' + data[i].brand_name + '</option>';
  }
  $("#brands").html(options);
  $("#edbrands").html(modaloptions);
}

function filltable(data){
  var i;
  var rows='';
  for(i = 0;i<data.length;i++){
    rows += '<tr id="row_num_' + data[i].product_id + '" oncontextmenu="return showcontextmenu(' + original_table_data[i].product_id + ');"">';
    rows += '<td id="id_row_' + data[i].product_id + '">' + data[i].product_id + '</td>';
    rows += '<td id="name_row_' + data[i].product_id + '">' + data[i].product_name + '</td>';
    rows += '<td id="brand_row_' + data[i].brand_id + '">' + data[i].brand_name + '</td>';
    rows += '<td id="image_row_' + data[i].product_id + '">' + '<img class="img-responsive" style="width:250px;" src="/storage/' + data[i].image + '"></td>';
    rows += '<td id="color_row_' + data[i].product_id + '">' + data[i].color + '</td>';
    rows += '<td id="specs_row_' + data[i].product_id + '"> Cpu:' + data[i].cpu;
    rows += ', internal: ' + data[i].internal;
    rows += ', external: ' + data[i].external;
    rows += ', ram: ' + data[i].ram;
    rows += ', camera: ' + data[i].camera;
    rows += ', battery: ' + data[i].battery;
    rows += ', sim: ' + data[i].sim + '</td>';
    rows += '<td id="price_row_' + data[i].product_id + '">' + data[i].price + ' VND</td>';
    rows += '<td id="description_row_' + data[i].product_id + '">' + data[i].description + '</td>';
    rows += '<td id="quantity_row_' + data[i].product_id + '">' + data[i].quantity + '</td>';
    rows += '</tr>';
  }

$("#products_table").html(rows);
  $('#table').DataTable();

}
</script>

<script>
		  var loadFile = function(event) {
		    var output = document.getElementById('output');
		    output.src = URL.createObjectURL(event.target.files[0]);
		  };
      var loadFilemodal = function(event) {
		    var output = document.getElementById('edoutput');
		    output.src = URL.createObjectURL(event.target.files[0]);
		  };
		</script>
<script>
function fillmodal(id){
  var current_product;
  for(var i = 0;i<original_table_data.length;i++){
    if(original_table_data[i].product_id == id){
      current_product = original_table_data[i];
      break;
    }
  }
  console.log(current_product);
  $('#edid').val(current_product.product_id);
  $('#edname').val(current_product.product_name);
  $('#'+ current_product.brand_name).attr('selected','selected');
  $('#edquantity').val(current_product.quantity);
  $('#edprice').val(current_product.price);
  $('#edcpu').val(current_product.cpu);
  $('#edram').val(current_product.ram);
  $('#edinternal').val(current_product.internal);
  $('#edexternal').val(current_product.external);
  $('#edcamera').val(current_product.camera);
  $('#edbattery').val(current_product.battery);
  $('#edsim').val(current_product.sim);
  $('#eddescription').html(current_product.description);
  var image = '/storage/'+current_product.image;
  console.log(image);
  $('#edoutput').attr('src',image);
  $('#white').prop('checked', false);
  $('#black').prop('checked', false);
  $('#red').prop('checked', false);
  $('#blue').prop('checked', false);
  $('#purple').prop('checked', false);
  $('#silver').prop('checked', false);
  $('#gold').prop('checked', false);
  $('#pink').prop('checked', false);
  var colors = current_product.color.split(",");
  for(var i = 0;i<colors.length;i++){
    $('#'+colors[i]).prop('checked', true);
  }
  //$('#edit_submit').attr('onclick','ajaxedit(' + id + ');');
}
</script>
  <script>
  var contextmenu = document.getElementById('contextmenu');
  window.onclick = hidecontextmenu;
  function showcontextmenu(id){
    $('#edit_link').attr('onclick','fillmodal(' + id + ');');
    $('#delete_link').attr('onclick','deleteproduct(' + id + ');');
    contextmenu.style.display = "block";
    contextmenu.style.left = event.pageX + 'px';
    contextmenu.style.top = event.pageY + 'px';
    return false;
    }
    function hidecontextmenu(){
      contextmenu.style.display = 'none';
    }

    function deleteproduct(id){
      var current_product;
      for(var i = 0;i<original_table_data.length;i++){
        if(original_table_data[i].product_id == id){
          current_product = original_table_data[i];
          break;
        }
      }
      var conf = confirm("Do you really want to permanently delete " + current_product.brand_name + " " + current_product.product_name + "? This cannot be undone!");
      if(conf == true){
        $('#delete_id_field').val(id);
        $('#deleteform').submit();
      }
    }
  </script>
  <form id="deleteform" method="post" action="{{URL::action('admin_products_controller@deleteproduct')}}">
    {{ csrf_field() }}
    <input type="hidden" id="delete_id_field" name="deleteid">
  </form>
</body>
</html>
