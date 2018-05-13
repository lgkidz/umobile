<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>UMobile-Mobile for you, Mobile for the future</title>
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.9.0/sweetalert2.all.min.js"></script> -->
    <link rel="stylesheet" href="../../css/offline.css">
    <script type="text/javascript" src="../../js/offline.js"></script>
    <link rel="stylesheet" href="../../css/index.css">
    <script type="text/javascript" src="../../js/index.js"></script>
    <style>
    .swal2-container {
      zoom: 1.5;
    }
    </style>
</head>
<body data-spy="scroll" data-offset="0">
  <?php echo $__env->make('includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="wrapper" style="margin-bottom:20px; clear: both">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <section class="content">
            <div class="container">
            <div class="order-breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/products">Điện thoại</a></li>
                    <li><a href="/products/<?php echo e($curbrand); ?>"><?php echo e($curbrand); ?></a></li>
                    <li><a href="#"><?php echo e($phone->product_name); ?></a></li>
                </ul>
            </div>

            <div class="container">
                <div class="product-intro">
                    <strong style="font-weight: bold; padding-right: 15px"><?php echo e($phone->product_name); ?></strong>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>

                <div class="product-detailed-info">
                    <div class="row">
                        <div class="col-xs-4 item-photo">
                            <img style="max-width:100%;" src="/storage/<?php echo e($phone->image); ?>" />
                        </div>
                        <div class="col-xs-5" style="border:0px solid gray">
                            <h3 class="product-price"><?php echo e(number_format($phone->price)); ?> VND</h3>
                            <h5 class = "company">Hàng được cung cấp bởi
                                <a href="#"><?php echo e($curbrand); ?></a> ·
                                <small style="color:#337ab7">(20000 chiếc đã được bán ra)</small>
                            </h5>

                            <div class="section saleoff">
                                <strong>Áp dụng khuyến mãi </strong>
                                <div class="saleoff-info">
                                    <ul>
                                        <li class="saleoff-detailed">Miễn phí chuyển hàng trong bán kính 10km</li>
                                        <li class="saleoff-detailed">Có trả góp, miễn phí lãi suất 0% </li>
                                        <li class="saleoff-detailed">Tặng phiếu mua hàng lên tới 0VND</li>
                                        <li class="saleoff-detailed">Cơ hội bốc thăm trúng thưởng</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="call-to-order">
                                <div class="call-content">
                                    <i class="fa fa-phone"></i>
                                    Gọi điện đặt hàng 24/24 theo hotline:
                                    <p><b>19001234</b> - <b>0123465789</b></p>
                                </div>
                            </div>

                            <div class="section select-attribute">
                                <strong class="title-attr" style="margin-top:15px;" >Màu sắc: </strong>
                                <div>
                                  <?php
                                    $colors = explode(",",$phone->color,"-1");
                                    foreach ($colors as $c) {
                                  ?>
                                      <div class="attr" style="width:30px;background:<?php echo $c; ?>"></div>
                                  <?php
                                    }
                                  ?>
                                </div>
                            </div>
                            <div class="section" style="padding-bottom:20px;">
                                    <button class="btn btn-success" style="border-radius: 5px" onclick="addtocart()">
                                        <span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm vào giỏ hàng
                                    </button>
                                <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> Thêm vào danh sách yêu thích</a></h6>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="panel panel-success">
                                <div class="panel-heading">Dịch vụ</div>
                                <div class="panel-body">
                                    <ul>
                                        <li class="guarantee">
                                            Sản phẩm đi kèm: Tai nghe Iphone, Sạc pin, sạc dự phòng, Ốp lưng</li>
                                        <li class="guarantee">Bảo hành từ 6 tới 12 tháng</li>
                                        <li class="guarantee">Miễn phí đổi trả nếu có sai sót trong 15 ngày</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-technical-analysis">
                    <div class="row">
                        <div class="col-xs-6 item-photo">
                            <div class="item-photo-desc">
                                <h4>Thiết kế mới</h4>
                                <p>IPhone X 256GB có thiết kế độc đáo, mới lạ so với các dòng Iphone trước đó, có trang bị kính cường lực
                                    với chất liệu thép không gỉ chống xước tạo cảm giác sang trọng cho người dùng</p>
                                <img style="max-width:100%;" src="../../img/iphone2.jpg" />

                                <h4>Cấu hình mạnh mẽ</h4>
                                <p>Chip A11 Bionic cùng RAM 3GB cho hiệu suất vượt trội so với các dòng IPhone trước đó</p>
                                <img style="width:100%;" src="../../img/a11bionic.jpg" />

                                <h4>Face ID</h4>
                                <p>Công nghệ nhận diện gương mặt trên điện thoại iPhone X có tên gọi Face ID.
                                    Face ID giúp bạn mở khóa máy nhanh chóng và chính xác cũng như thanh toán cực kỳ an toàn xác thực và nhanh chóng.</p>
                                <img style="width:100%;" src="../../img/faceID.jpg" />

                                <h4>Chống bụi và nước với chuẩn IP67</h4>
                                <p>Điện thoại Apple có khả năng chống bụi và nước sẽ khiến bạn có thể sử dụng máy trong mọi điều kiện không gian,
                                    thời tiết và có thể sống sót dưới nước ở độ sâu 1m trong khoảng thời gian 30 phút mà không bị hư hỏng gì.</p>
                                <img style="width:100%;" src="../../img/chongbui.jpg" />
                            </div>
                        </div>
                        <div class="col-xs-1"></div>
                        <div class="col-xs-5 product-statistics">
                            <h3 style="font-weight: bold">Thông số kỹ thuật</h3>
                            <table style="width:100%">
                                <tbody>
                                <tr style="border-bottom: 1px solid #eee; color: red; background: #e8ebef">
                                    <th colspan="2">Thông tin chung</th>
                                </tr>
                                <tr>
                                    <td class="spec-title">Hãng sản xuất: </td>
                                    <td class="spec-content">
                                        <span><?php echo e($curbrand); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Xuất xứ: </td>
                                    <td class="spec-content">
                                        <span>Chính hãng</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Hệ điều hành: </td>
                                    <td class="spec-content">
                                        <span>ios/android</span>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #eee; color: red; background: #e8ebef">
                                    <th colspan="2">Màn hình</th>
                                </tr>
                                <tr>
                                    <td class="spec-title">Màn hình: </td>
                                    <td class="spec-content">
                                        <span>Cảm ứng</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Công nghệ cảm ứng: </td>
                                    <td class="spec-content">
                                        <span>Cảm ứng đa điểm</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Độ phân giải: </td>
                                    <td class="spec-content">
                                        <span>1125 x 2436 Pixels</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Mặt kính cảm ứng: </td>
                                    <td class="spec-content">
                                        <span>Kính cường lực</span>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #eee; color: red; background: #e8ebef">
                                    <th colspan="2">Camera</th>
                                </tr>
                                <tr>
                                    <td class="spec-title">Camera </td>
                                    <td class="spec-content">
                                        <span><?php echo e($phone->camera); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Tính năng camera: </td>
                                    <td class="spec-content">
                                        <span>Nhận diện khuôn mặt, chỉnh sửa điểm ảnh </span>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #eee; color: red; background: #e8ebef;">
                                    <th colspan="2">Bộ nhớ và lưu trữ</th>
                                </tr>
                                <tr>
                                    <td class="spec-title">CPU: </td>
                                    <td class="spec-content">
                                        <span><?php echo e($phone->cpu); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">RAM: </td>
                                    <td class="spec-content">
                                        <span><?php echo e($phone->ram); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Bộ nhớ trong: </td>
                                    <td class="spec-content">
                                        <span><?php echo e($phone->internal); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Dung lượng pin: </td>
                                    <td class="spec-content">
                                        <span><?php echo e($phone->battery); ?></span>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #eee; color: red; background: #e8ebef;">
                                    <th colspan="2">Tiện ích</th>
                                </tr>
                                <tr>
                                    <td class="spec-title">Bảo mật nâng cao: </td>
                                    <td class="spec-content">
                                        <span>Nhận diện FaceID </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Tính năng: </td>
                                    <td class="spec-content">
                                        <span>Kháng nước, kháng bụi </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Xem phim: </td>
                                    <td class="spec-content">
                                        <span>H265, 3GP, MP4,H263, MPEG4-AVC </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Nghe nhạc: </td>
                                    <td class="spec-content">
                                        <span>MP3, WMA, AAC, Midi, Loseless </span>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #eee; color: red; background: #e8ebef;">
                                    <th colspan="2">Thiết kế và Trọng lượng</th>
                                </tr>
                                <tr>
                                    <td class="spec-title">Thiết kế: </td>
                                    <td class="spec-content">
                                        <span>Nguyên khối </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Chất liệu: </td>
                                    <td class="spec-content">
                                        <span>Khung kim loại </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Kích thước: </td>
                                    <td class="spec-content">
                                        <span>Dài 143.6mm - Ngang 70.9mm - Dày 7.7mm </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="spec-title">Trọng lượng: </td>
                                    <td class="spec-content">
                                        <span>~180g </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="product-news">
                                <h3 class="product-news-title">Tin tức về <?php echo e($phone->product_name); ?></h3>
                                <article class="article-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="article-thumbnail">
                                                <a href="#" title="Apple thất vọng tràn trề với doanh số iPhone X">
                                                    <img src="../../img/iphonex2.jpg" alt="" style="width: 100%; height: 80px">
                                                </a>
                                            </p>
                                        </div>

                                        <div class="col-md-9">
                                            <header>
                                                <div class="article-title">
                                                    <a href="#" title="Apple thất vọng tràn trề với doanh số iPhone X">Apple thất vọng tràn trề với doanh số iPhone X</a>
                                                    <p class="article-summary">Apple chỉ sản xuất khoảng 8 triệu chiếc iPhone X cho quý II năm nay
                                                        do sức bán của sản phẩm đi xuống.</p>
                                                </div>
                                            </header>
                                        </div>
                                    </div>
                                </article>

                                <article class="article-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="article-thumbnail">
                                                <a href="#" title="Apple thất vọng tràn trề với doanh số iPhone X">
                                                    <img src="../../img/iphonex2.jpg" alt="" style="width: 100%; height: 80px">
                                                </a>
                                            </p>
                                        </div>

                                        <div class="col-md-9">
                                            <header>
                                                <div class="article-title">
                                                    <a href="#" title="Apple thất vọng tràn trề với doanh số iPhone X">Apple thất vọng tràn trề với doanh số iPhone X</a>
                                                    <p class="article-summary">Apple chỉ sản xuất khoảng 8 triệu chiếc iPhone X cho quý II năm nay
                                                        do sức bán của sản phẩm đi xuống.</p>
                                                </div>
                                            </header>
                                        </div>
                                    </div>
                                </article>

                                <article class="article-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="article-thumbnail">
                                                <a href="#" title="Apple thất vọng tràn trề với doanh số iPhone X">
                                                    <img src="../../img/iphonex2.jpg" alt="" style="width: 100%; height: 80px">
                                                </a>
                                            </p>
                                        </div>

                                        <div class="col-md-9">
                                            <header>
                                                <div class="article-title">
                                                    <a href="#" title="Apple thất vọng tràn trề với doanh số iPhone X">Apple thất vọng tràn trề với doanh số iPhone X</a>
                                                    <p class="article-summary">Apple chỉ sản xuất khoảng 8 triệu chiếc iPhone X cho quý II năm nay
                                                        do sức bán của sản phẩm đi xuống.</p>
                                                </div>
                                            </header>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-rate">
                    <span class="heading">Đánh giá của người dùng khi sử dụng sản phẩm</span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <p>4.67 average based on 500 reviews.</p>
                    <hr style="border:3px solid #f1f1f1">

                    <div class="row">
                        <div class="side">
                            <div>5 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-5"></div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>400</div>
                        </div>
                        <div class="side">
                            <div>4 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-4"></div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>64</div>
                        </div>
                        <div class="side">
                            <div>3 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-3"></div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>17</div>
                        </div>
                        <div class="side">
                            <div>2 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-2"></div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>8</div>
                        </div>
                        <div class="side">
                            <div>1 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-1"></div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>11</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
    <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes.loginform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script>
    var cur_product_id = <?php echo e($phone->product_id); ?>;
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function addtocart(){
      var id = cur_product_id;
      $.ajax({
         type:'POST',
         url:'/addtocart',
         dataType:'json',
         data: {
           id:id
         },
         success:function(data){
           console.log(data);
           swal({
            title: 'Thành công',
            text: "Đã thêm sản phẩm này vào giỏ hàng",
            type: 'success',
            showCancelButton: true,
            confirmButtonText: 'Xem giỏ hàng',
            cancelButtonText: 'Mua thêm đã!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-primary',
          }).then((result) => {
            if (result.value) {
              window.location.href = "/cart";
            } else{
              window.location.href = "/products";
            }
          })
         }
      });
    }
    </script>
</body>
</html>
