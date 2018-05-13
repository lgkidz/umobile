<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UMobile-Mobile for you, Mobile for the future</title>
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.9.0/sweetalert2.all.min.js"></script> -->
    <link rel="stylesheet" href="/css/offline.css">
    <script type="text/javascript" src="/js/offline.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/index.js"></script>
    <style>
    .swal2-container {
      zoom: 1.5;
    }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="0">
@if (session('checks'))
  <script>
  swal({
    type: 'success',
    title: '{{session('checks')}}',
    showConfirmButton: false,
    timer: 1500
    })
  </script>
@endif
@include('includes.navbar')

    <div class="wrapper">
        <div class="row">
            <div class="col-md-12 parallax">
                <div class="col-md-12 text-center filter">
                    <h1 style="color:white">Umobile</h1>
                    <h3 style="color:white">Mobile for you, mobile for the future</h3>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container">
                <div class="col-xs-12"  style="margin-top:50px;">
                    <div class="brandinfo col-xs-12">
                        <h3 class="brandname pull-left">Khuyến mãi</h3>
                    </div>
                    <div class="col-xs-12" style="border: 1px solid #ECECEC;">
                      <?php
                        for($i = 0;$i < 4;$i++){
                      ?>
                        <div class="col-xs-12 col-md-3 text-center" style="border-top:1px solid #ECECEC;">
                          <div class="thumbnailx">
                                <div class="col-xs-12">
                                <a href="/products/<?php echo $pros[$i]->brand_name ?>/<?php echo $pros[$i]->product_id ?>">
                                    <img src="/storage/<?php echo $pros[$i]->image ?>" alt="" class="group list-group-image" style="max-height: 200px;">
                                    <h4 class="group inner list-group-item-heading"><?php echo $pros[$i]->brand_name ?> <?php echo $pros[$i]->product_name ?></h4>
                                </a>
                              </div>
                                <div class="col-xs-12">
                                    <p class="group inner list-group-item-next">
                                        iPhone X sử dụng tấm nền OLED đầu tiên trong các đời iPhone. Màn hình với kích cỡ 5.8 inch,
                                        đạt mật độ điểm ảnh 458 PPI (1125 x 2468 pixel)
                                    </p>
                                  </div>
                                    <div class="col-xs-12" style="padding-bottom:20px;">
                                        <p class="lead"><?php echo number_format($pros[$i]->price) ?> VND</p>
                                        <a class="btn btn-success" href="/products/<?php echo $pros[$i]->brand_name ?>/<?php echo $pros[$i]->product_id ?>">Xem chi tiết</a>
                                    </div>
                              </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xs-12"  style="margin-top:20px;">
                    <div class="brandinfo col-xs-12">
                        <h3 class="pull-left">Điện thoại</h3>
                        <h5 class="pull-right" style="margin-top:22px;"><a href="/products" class="middle-product-looking-more">Xem thêm >></a></h5>
                    </div>
                    <div class="col-xs-12" style="border: 1px solid #ECECEC;border-top:none;">
                      <?php
                        for($i = 0;$i < 8;$i++){
                      ?>
                        <div class="col-xs-12 col-md-3 text-center" style="border-top:1px solid #ECECEC;">
                          <div class="thumbnailx">
                                <div class="col-xs-12">
                                <a href="/products/<?php echo $pros[$i]->brand_name ?>/<?php echo $pros[$i]->product_id ?>">
                                    <img src="/storage/<?php echo $pros[$i]->image ?>" alt="" class="group list-group-image" style="max-height: 200px;">
                                    <h4 class="group inner list-group-item-heading"><?php echo $pros[$i]->brand_name ?> <?php echo $pros[$i]->product_name ?></h4>
                                </a>
                              </div>
                                <div class="col-xs-12">
                                    <p class="group inner list-group-item-next">
                                        iPhone X sử dụng tấm nền OLED đầu tiên trong các đời iPhone. Màn hình với kích cỡ 5.8 inch,
                                        đạt mật độ điểm ảnh 458 PPI (1125 x 2468 pixel)
                                    </p>
                                  </div>
                                    <div class="col-xs-12" style="padding-bottom:20px;">
                                        <p class="lead"><?php echo number_format($pros[$i]->price) ?> VND</p>
                                        <a class="btn btn-success" href="/products/<?php echo $pros[$i]->brand_name ?>/<?php echo $pros[$i]->product_id ?>">Xem chi tiết</a>
                                    </div>
                              </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

@include('includes.footer')

@include('includes.loginform')
</body>
</html>
