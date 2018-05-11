<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orders</title>
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
        Orders
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Orders</h3>
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer Name</th>
                  <th>Ordered</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Order Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody id="products_table">
                </tbody>
                <tfoot>
                  <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Ordered</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Order Date</th>
                    <th>Status</th>
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
     url:'/admin/orders/list',
     data:'z',
     success:function(data){
       console.log(data);
       tabledata = JSON.parse(data.orders);
       set_original_table_data(tabledata);
        filltable(tabledata);
        console.log(data.orders);
     }
  });
});

function filltable(data){
  var i = 0;
  var j;
  var rows='';
  var current_order = data[0].order_id;
  do{
    console.log("i: "+ i);
    console.log("co: "+current_order);
    if(i > 0 && current_order == data[i].order_id){
      current_order = data[i].order_id;
      i++;
      continue;
    }
    else{
      current_order = data[i].order_id;
      rows += '<tr id="row_num_' + data[i].order_id + '" >';
      rows += '<td id="order_id_row_' + data[i].order_id + '">' + data[i].order_id + '</td>';
      rows += '<td id="customer_name_row_' + data[i].order_id + '">' + data[i].customer_name + '</td>';
      rows += '<td id="ordered_row_' + data[i].order_id + '">';
      for(j = 0;j<data.length;j++){
        if(data[j].order_id == current_order){
          rows += data[j].product_name + "<br>";
        }
      }
      rows += '</td>';
      rows += '<td id="phone_row_' + data[i].order_id + '">' + data[i].phone + '</td>';
      rows += '<td id="email_row_' + data[i].order_id + '">' + data[i].email + '</td>';
      rows += '<td id="address_row_' + data[i].order_id + '">' + data[i].address + '</td>';
      rows += '<td id="created_at_row_' + data[i].order_id + '">' + data[i].created_date + '</td>';
      rows += '<td id="status_row_' + data[i].order_id + '"><span class="dropdown">' + data[i].status;
      rows += '<i class="fa fa-angle-down pull-right dropdown-toggle" data-toggle="dropdown"></i><ul class="dropdown-menu">';
      rows += '<li><a>Thay đổi trạng thái</a></li>';
      rows += '<li class="divider"></li>';
      rows += '<li onclick="changestatus('+ data[i].order_id + ',' + 1 + ');"><a>Shipped</a></li>';
      rows += '<li onclick="changestatus('+ data[i].order_id + ',' + 2 + ');"><a>Pending</a></li>';
      rows += '<li onclick="changestatus('+ data[i].order_id + ',' + 3 + ');"><a>Canceled</a></li>';
      rows += '</ul></span></td>';
      rows += '</tr>';
      i++;
    }
  }
  while(i<data.length);

  for(i = 0;i<data.length;i++){

  }

$("#products_table").html(rows);
$('#table').DataTable();

}

function ban(id){
  var current_mem;
  for(var i = 0;i<original_table_data.length;i++){
    if(original_table_data[i].member_id == id){
      current_mem = original_table_data[i];
      break;
    }
  }
  if(current_mem['ban'] == 0){
    var conf = confirm("Do you really want to ban " + current_mem.first_name + " " + current_mem.last_name + "?");
  }
  else{
    var conf = confirm("Do you really want to unban " + current_mem.first_name + " " + current_mem.last_name + "?");
  }
  if(conf == true){
    $('#mem_id').val(id);
    $('#ban_form').submit();
  }
}


</script>
<script>
function changestatus(id,statusid){

  var cnf = confirm("Bạn chắc chắn muốn thay đổi trạng thái đơn hàng này chứ?");
  if(cnf == true){
    var status = "";
    if(statusid == 1){
      status = "Shipped";
    }
    else if(statusid == 2){
      status = "Pending";
    }
    else if(statusid == 3){
      status = "Canceled";
    }
    else{
      status = "Pending";
    }
    //console.log(id + " ," + status);
    $('#orderid').val(id);
    $('#statusx').val(status);
    $('#statusform').submit();
  }
}
</script>
<form id="statusform" method="post" action="{{URL::action('admin_orders_controller@changestatus')}}">
{{ csrf_field() }}
  <input id="orderid" type="hidden" name="id">
  <input id="statusx" type="hidden" name="status">
</form>
</body>
</html>
