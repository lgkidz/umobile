<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php echo $__env->make('admin.jsandcss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.includes.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo e(sizeof($data)); ?></h3>

              <p>Products Ordered</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/admin/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e(sizeof($mems)); ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-7 connectedSortable">
          <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php $__currentLoopData = $mems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <img src=" <?php if($m->avatar != ""): ?>
                          /storage/<?php echo e($m->avatar); ?>

                        <?php else: ?>
                          ../img/defaultface.jpg
                        <?php endif; ?>" alt="User Image" style="max-height:150px;">
                        <a class="users-list-name" href="/admin/members"><?php echo e($m->first_name); ?> <?php echo e($m->last_name); ?></a>
                        <span class="users-list-date"><?php echo e($m->email); ?></span>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="/admin/members" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Order Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    $j;
                    $current_order = $data[0]->order_id;
                    do{
                      if($i > 0 && $current_order == $data[$i]->order_id){
                        $current_order = $data[$i]->order_id;
                        $i++;
                        continue;
                      }
                      else{
                        $current_order = $data[$i]->order_id;
                        ?>
                        <tr>
                            <td><?php echo $data[$i]->order_id ?></td>
                            <td>
                              <?php
                              for($j = 0;$j<sizeof($data);$j++){
                                if($data[$j]->order_id == $current_order){
                                  echo $data[$j]->quantity . " " . $data[$j]->product_name;
                                  echo "<br>";
                                }
                              }
                              ?>
                            </td>
                            <td><?php echo $data[$i]->status ?></td>
                            <td><?php echo $data[$i]->created_date ?></td>
                        </tr>
                        <?php
                        $i++;
                      }
                    }
                    while($i<sizeof($data));
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/admin/orders" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </section>
        <section class="col-lg-5 connectedSortable">
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Top Selling Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="/storage/<?php echo e($prod[0]->image); ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="/storage/<?php echo e($prod[0]->image); ?>" class="product-title"><?php echo e($prod[0]->product_name); ?>

                      <span class="label label-warning pull-right"><?php echo e(number_format($prod[0]->price)); ?> VND</span></a>

                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="/admin/products" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-envelope"></i>

                  <h3 class="box-title">Quick Email</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message"
                                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                    <i class="fa fa-arrow-circle-right"></i></button>
                </div>
                <!-- /.box-footer -->
              </div>
        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</body>
</html>
