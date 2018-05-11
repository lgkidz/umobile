<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UMobile-Mobile for you, Mobile for the future</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.9.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/css/index.css">
    <script type="text/javascript" src="/js/index.js"></script>
    <style>
    .swal2-container {
      zoom: 1.5;
    }
    </style>
</head>

<body data-spy="scroll" data-offset="0">
@include('includes.navbar')
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
                <h3 class="your-cart-intro">Giỏ hàng của bạn</h3>
                <div class="cart-detailed-info">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-12 table-product-list">
                            <table class="table table-striped table-hover product-checkout">
                                <thead>
                                    <tr>
                                        <th colspan="6"><h5 style="text-align: left">Giỏ hàng của bạn hiện có {{sizeof($phones)}} sản phẩm</h5></th>
                                    </tr>
                                    <tr>
                                        <th><h5>Hình ảnh mô tả</h5></th>
                                        <th><h5>Tên sản phẩm</h5></th>
                                        <th><h5>Đơn giá</h5></th>
                                        <th><h5>Ghi chú</h5></th>
                                        <th><h5></h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if (sizeof($phones))
                                    @foreach ($phones as $p)
                                      <tr id="row_{{$p->product_id}}">
                                          <td>
                                              <a href="/products/{{$p->brand_name}}/{{$p->product_id}}">
                                                  <img src="/storage/{{$p->image}}" alt="{{$p->product_name}}" style="max-height:150px;">
                                              </a>
                                          </td>
                                          <td style="padding-top: 20px">{{$p->brand_name}} {{$p->product_name}}</td>
                                          <td id="price_{{$p->product_id}}" style="padding-top: 20px">{{number_format($p->price)}} VND</td>
                                          <td style="padding-top: 20px">Điện thoại mới, hàng chính hãng, tặng kèm ốp lưng</td>
                                          <td style="padding-top: 20px"><button class="btn btn-warning" onclick="remove({{$p->product_id}})">x</button></td>
                                      </tr>
                                    @endforeach
                                  @else
                                    <tr><td colspan="5">Bạn chưa có sản phẩm nào trong giỏ hàng</td></tr>
                                  @endif
                                </tbody>
                            </table>
                            <div class="buymore-button">
                                <a href="/products" class="btn btn-primary">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <table class="table table-striped table-hover list-products">
                                <thead>
                                    <tr>
                                        <th colspan="2"><h4 style="font-weight: bold">Thông tin đơn hàng</h4></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold">Giá trị thực: </td>
                                        <td id="rp">
                                          @if (sizeof($phones))
                                            @php
                                              $total = 0;
                                            @endphp
                                            @foreach ($phones as $p)
                                              @php
                                                $total += $p->price;
                                              @endphp
                                            @endforeach
                                            {{number_format($total)}} VND
                                          @else
                                            0 VND
                                          @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold">Tổng số tiền thanh toán: </td>
                                        <td id="totalp">
                                          @if (sizeof($phones))
                                            @php
                                              $total = 0;
                                            @endphp
                                            @foreach ($phones as $p)
                                              @php
                                                $total += $p->price;
                                              @endphp
                                            @endforeach
                                            {{number_format($total)}} VND
                                          @else
                                            0 VND
                                          @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="checkout-button">
                                <a href="/checkout" class="btn btn-success">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@include('includes.footer')
@include('includes.loginform')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function remove(id){
    swal({
      title: 'Bạn chắc chứ?',
      text: "Bạn chắc chắn muốn bỏ sản phẩm này khỏi giỏ hàng chứ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ừ xóa đi!',
      cancelButtonText: 'Không, không xóa!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
           type:'POST',
           url:'/removefromcart',
           dataType:'json',
           data: {
             id:id
           },
           success:function(data){
             console.log(data);
             $('#row_' + id).remove();
             $('.badge').html(data.size);
             $('#rp').html(data.totalp + " VND");
             $('#totalp').html(data.totalp + " VND");
             swal(
               'Đã xóa!',
               'Đã bỏ sản phẩm ra khỏi giỏ hàng của bạn',
               'success'
             )
           }
        });
      }
    });
  }
</script>
</body>
</html>
