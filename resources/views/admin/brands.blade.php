<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Brands</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@include('admin.jsandcss')
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  @include('admin.includes.header')
  @include('admin.includes.sidemenu')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Brands
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Brands</li>
      </ol>
    </section>

    <!---------------------------------context menu----------------------------------------->

          <div id="contextmenu" class="context-menu">
            <ul>
              <li id="edit_link" data-toggle="modal" data-target="#myModal">Edit this one</li>
              <li id="delete_link">Delete this one</li>
            </ul>
          </div>

    <!---------------------------------END context menu----------------------------------------->

    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Brands</h3>
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Brand ID</th>
                  <th>Brand Name</th>
                </tr>
                </thead>
                <tbody id="products_table">
                </tbody>
                <tfoot>
                  <tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Add a Brand</h3>
            </div>
            <div class="box-body">
              <form method="post" action="{{URL::action('admin_brands_controller@insert')}}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="brand_name">Brand Name: </label>
                  <input class="form-control" type="text" name="brand_name" required id="brand_name" placeholder="Remember to enter the brand's name correctly">
                </div>
                <div class="form-group">
                  <input type="submit" value="sumbit" class="btn btn-info pull-right">
                </div>
              </form>
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
     url:'/admin/brands/list',
     data:'z',
     success:function(data){
       //console.log(data);
       tabledata = JSON.parse(data.brands);
       set_original_table_data(tabledata);
        filltable(tabledata);
     }
  });
});

function filltable(data){
  var i;
  var rows='';
  for(i = 0;i<data.length;i++){
    rows += '<tr id="row_num_' + data[i].brand_id + '" oncontextmenu="return showcontextmenu(' + original_table_data[i].brand_id + ');"">';
    rows += '<td id="id_row_' + data[i].brand_id + '">' + data[i].brand_id + '</td>';
    rows += '<td id="name_row_' + data[i].brand_id + '">' + data[i].brand_name + '</td>';
    rows += '</tr>';
  }

$("#products_table").html(rows);
$('#table').DataTable();

}

</script>
<script>
var contextmenu = document.getElementById('contextmenu');
window.onclick = hidecontextmenu;
function showcontextmenu(id){
  $('#edit_link').attr('onclick','editbrand(' + id + ');');
  $('#delete_link').attr('onclick','deletebrand(' + id + ');');
  contextmenu.style.display = "block";
  contextmenu.style.left = event.pageX + 'px';
  contextmenu.style.top = event.pageY + 'px';
  return false;
  }
  function hidecontextmenu(){
    contextmenu.style.display = 'none';
  }

  function editbrand(id){
    var editform = "";
    var current_brand = $('#name_row_' + id).html();
    temp_name = current_brand;
    editform += '<form id="edit_form" method="post" action="{{URL::action('admin_brands_controller@edit')}}">';
    editform += '<input id="brand_name_edit" type="text" value="' + current_brand + '" onfocusout="focusOut(' + id + ');">';
    editform += '</form>';
    $('#name_row_' + id).html(editform);
    $('#brand_name_edit').focus();
    document.getElementById('edit_form').onsubmit = function(event){
      event.preventDefault();
      validate_form(id);
    };
  }
  var temp_name ="";

  function validate_form(id){
    var value = $('#brand_name_edit').val();
    if(value != "" && value!= temp_name){
      var cnf = confirm("Do you really want change this brand's name?");
      if(cnf == true){
        $.ajax({
           type:'POST',
           url:'/admin/brands/edit',
           data:{
             id: id,
             value:value
           },
           success:function(data){
             //console.log(data);
             tabledata = JSON.parse(data.brands);
             set_original_table_data(tabledata);
              filltable(tabledata);
           }
        });
      }
    }
  }
  function focusOut(id){
    $('#name_row_' + id).html(temp_name);
  }

  function deletebrand(id){
    var current_brand;
    for(var i = 0;i<original_table_data.length;i++){
      if(original_table_data[i].brand_id == id){
        current_brand = original_table_data[i];
        break;
      }
    }
    var conf = confirm("Do you really want to permanently delete " + current_brand.brand_name + "? This cannot be undone!");
    if(conf == true){
      $('#delete_id_field').val(id);
      $('#deleteform').submit();
    }
  }
</script>
<form id="deleteform" method="post" action="{{URL::action('admin_brands_controller@delete')}}">
  {{ csrf_field() }}
  <input type="hidden" id="delete_id_field" name="deleteid">
</form>
</body>
</html>
