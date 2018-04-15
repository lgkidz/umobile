<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrators</title>
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
        Administrators
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Administrators</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Admins</h3>
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Real Name</th>
                  <th>Role</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody id="products_table">
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Real Name</th>
                    <th>Role</th>
                    <th>Description</th>
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
       url:'/admin/admins/list',
       data:'z',
       success:function(data){
         //console.log(data);
         tabledata = JSON.parse(data.admins);
         set_original_table_data(tabledata);
          filltable(tabledata);
       }
    });
  });

  function filltable(data){
    var i;
    var rows='';
    for(i = 0;i<data.length;i++){
      rows += '<tr id="row_num_' + data[i].id +  '" >';
      rows += '<td id="id_row_' + data[i].id + '">' + data[i].id + '</td>';
      rows += '<td id="name_row_' + data[i].id + '">' + data[i].real_name + '</td>';
      rows += '<td id="role_row_' + data[i].id + '">' + data[i].role + '</td>';
      rows += '<td id="des_row_' + data[i].id + '">' + data[i].description + '</td>';
      rows += '</tr>';
    }

  $("#products_table").html(rows);
  $('#table').DataTable();

  }

  </script>
</div>
</body>
</html>
