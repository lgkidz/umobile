<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UMobile-Mobile for you, Mobile for the future</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.9.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/css/index.css">
    <script type="text/javascript" src="/js/index.js"></script>
</head>

<body data-spy="scroll" data-offset="0">
    <?php echo $__env->make('includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="wrapper" style="margin-bottom:20px; clear: both">
        <div class="row">
            <div class="col-md-12 parallax">
                <div class="col-md-12 text-center filter">
                    <h1 style="color:white">Umobile</h1>
                    <h3 style="color:white">Mobile for you, mobile for the future</h3>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="tintuc">
                    <div style="margin-top: -20px" id="about_us">
                        <div class="w3-sand w3-padding-64 w3-margin-bottom w3-center">

                        </div>
                        <div class="container-fluid">
                            <div style="padding-left: 20px" class="col-lg-6 col-md-6 col-sm-12">
                                <table class="table table-striped table-hover product-checkout">
                                    <thead>
                                        <tr>
                                            <th colspan="5"><h5 style="text-align: left">Giỏ hàng của bạn hiện có <?php echo e(sizeof($phones)); ?> sản phẩm</h5></th>
                                        </tr>
                                        <tr>
                                            <th><h5>Tên sản phẩm</h5></th>
                                            <th><h5>Đơn giá</h5></th>
                                            <th><h5>Ghi chú</h5></th>
                                            <th><h5>Thành tiền</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(sizeof($phones)): ?>
                                        <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr id="row_<?php echo e($p->product_id); ?>">
                                              <td style="padding-top: 20px"><?php echo e($p->brand_name); ?> <?php echo e($p->product_name); ?></td>
                                              <td id="price_<?php echo e($p->product_id); ?>" style="padding-top: 20px"><?php echo e(number_format($p->price)); ?> VND</td>
                                              <td style="padding-top: 20px">Điện thoại mới, hàng chính hãng, tặng kèm ốp lưng</td>
                                              <td style="padding-top: 20px"><?php echo e(number_format($p->price)); ?> VND</td>
                                          </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3"><h5 style="text-align: left">Tổng tiền : </h5></th>
                                            <th colspan="1"><h5><?php if(sizeof($phones)): ?>
                                              <?php
                                                $total = 0;
                                              ?>
                                              <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                  $total += $p->price;
                                                ?>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              <?php echo e(number_format($total)); ?> VND
                                            <?php else: ?>
                                              0 VND
                                            <?php endif; ?></h5></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="col-lg-6 col-md-6 col-xs-12">
                              <form method="post" action="/addorder">
                                <?php echo e(csrf_field()); ?>

                                <h3 style="font-weight: bold">Thông tin liên lạc</h3>
                                <table class="table table-striped customer-contact">
                                    <tbody>
                                        <tr style="border-bottom: 1px solid #eee">
                                            <td class="contact-input">
                                                <h5>Tên khách hàng: </h5>
                                                <input class="form-control" name="name" type="text" style="width: 100%" placeholder="Tên người nhận..." <?php if(session('member_id') != null): ?>
                                                  value="<?php echo e(session('first_name')); ?> <?php echo e(session('last_name')); ?>"
                                                <?php endif; ?> required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="contact-input">
                                                <h5>Số điện thoại: </h5>
                                                <input class="form-control" name="phone" type="text" style="width: 100%" placeholder="Số điện thoại..." <?php if(session('member_id') != null): ?>
                                                  value="<?php echo e(session('phone')); ?>"
                                                <?php endif; ?> required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="contact-input">
                                                <h5>Địa chỉ: </h5>
                                                <input class="form-control" name="address" type="text" style="width: 100%" placeholder="Địa chỉ giao hàng..." <?php if(session('member_id') != null): ?>
                                                  value="<?php echo e(session('address')); ?>"
                                                <?php endif; ?> required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="contact-input">
                                                <h5>Email: </h5>
                                                <input class="form-control" name="email" type="email" style="width: 100%" placeholder="Email..." <?php if(session('member_id') != null): ?>
                                                  value="<?php echo e(session('email')); ?>" disabled
                                                <?php endif; ?> required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="checkout-button">
                                    <button type="submit" href="#" class="btn btn-success">Tiến hành thanh toán</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.loginform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
