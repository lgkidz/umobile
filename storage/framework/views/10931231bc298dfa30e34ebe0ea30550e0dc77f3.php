<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>feedback</title>
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
        Feedback
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Feedback</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All feedbacks</h3>
            </div>
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Content</th>
                  <th>Reply</th>
                </tr>
                </thead>
                <tbody id="products_table">
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Reply</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Mailing</h3>
            </div>
            <div class="box-body">
              <form method="post" action="<?php echo e(URL::action('admin_FAM_controller@mail')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                  <label for="to">To:</label>
                  <input id="to" type="email" class="form-control" placeholder="To:..." name="to" required>
                </div>
                <div class="form-group">
                  <textarea name="content" id="editor" required>

                  </textarea>
                </div>
                <button type="submit" class="btn btn-success pull-right"><span class="fa fa-paper-plane"></span> Send</button>
              </form>
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
       url:'/admin/FAM/list',
       data:'z',
       success:function(data){
         console.log(data);
         tabledata = JSON.parse(data.fs);
         set_original_table_data(tabledata);
          filltable(tabledata);
       }
    });
  });

  function filltable(data){
    var i;
    var rows='';
    for(i = 0;i<data.length;i++){
      rows += '<tr id="row_num_' + data[i].id + '" >';
      rows += '<td id="id_row_' + data[i].id + '">' + data[i].id + '</td>';
      rows += '<td id="name_row_' + data[i].id + '">' + data[i].pen_name + '</td>';
      rows += '<td id="email_row_' + data[i].id + '">' + data[i].email + '</td>';
      rows += '<td id="content_row_' + data[i].id + '">' + data[i].content + '</td>';
      rows += '<td id="reply_row_' + data[i].id + '"><button class="btn btn-primary" onclick="reply('+ data[i].email +');">Reply</button</td>';
      rows += '</tr>';
    }

  $("#products_table").html(rows);
  $('#table').DataTable();

  }

  </script>
  <script src="/ckeditor/ckeditor.js"/></script>
  <script>
    CKEDITOR.replace('editor');
  </script>
</div>
</body>
</html>
