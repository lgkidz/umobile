<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Members</title>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php echo $__env->make('admin.jsandcss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.includes.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Members
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Members</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Members</h3>
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>gender</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Ban?</th>
                </tr>
                </thead>
                <tbody id="products_table">
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Ban?</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
       url:'/admin/members/list',
       data:'z',
       success:function(data){
         console.log(data);
         tabledata = JSON.parse(data.members);
         set_original_table_data(tabledata);
          filltable(tabledata);
       }
    });
  });

  function filltable(data){
    var i;
    var rows='';
    for(i = 0;i<data.length;i++){
      var ban_or_not = "Banned, unban?";
      var ban_color = "darkgrey";
      if(data[i].ban == 0){
        ban_or_not = "Active. Ban?";
        ban_color = "white";
      }
      rows += '<tr id="row_num_' + data[i].member_id + '" style="background:' + ban_color + '" >';
      rows += '<td id="id_row_' + data[i].member_id + '">' + data[i].member_id + '</td>';
      rows += '<td id="fname_row_' + data[i].member_id + '">' + data[i].first_name + '</td>';
      rows += '<td id="lname_row_' + data[i].member_id + '">' + data[i].last_name + '</td>';
      rows += '<td id="gender_row_' + data[i].member_id + '">' + data[i].gender + '</td>';
      rows += '<td id="phone_row_' + data[i].member_id + '">' + data[i].phone + '</td>';
      rows += '<td id="email_row_' + data[i].member_id + '">' + data[i].email + '</td>';
      rows += '<td id="address_row_' + data[i].member_id + '">' + data[i].address + '</td>';
      rows += '<td id="ban_row_' + data[i].member_id + '"><button class="btn btn-danger" onclick="ban('+ data[i].member_id +');">'+ ban_or_not + '</button</td>';
      rows += '</tr>';
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
</div>
<form id="ban_form" method="post" action="<?php echo e(URL::action('admin_members_controller@ban')); ?>">
<?php echo e(csrf_field()); ?>

<input type="hidden" name="id" id="mem_id">
</form>
</body>
</html>
