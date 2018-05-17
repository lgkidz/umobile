<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <ul class="nav nav-pills menu-bar">
                <li class="active"><a data-toggle="pill" href="#home">Thông tin cá nhân</a></li>
                <li><a data-toggle="pill" href="#menu1">Danh sách đơn hàng</a></li>
                <li><a data-toggle="pill" href="#menu2">Gửi phản hồi</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-md-offset-0">
                                <div class="panel panel-info">
                                    <div class="panel panel-heading">
                                        <h3 class="panel-title", style="font-weight: bold">Thông tin về họ tên, số điện thoại, địa chỉ sẽ được sử dụng làm thông tin giao hàng mặc định</h3>
                                    </div>
                                    <div class="panel panel-body">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4" align="center">
                                                <img src="@if ($mem->avatar != null && $mem->avatar != "")
                                                  /storage/{{$mem->avatar}}
                                                @else
                                                  img/defaultface.jpg
                                                @endif" class="img img-responsive img-circle" id="uavatar" alt="" style="width: 200px; height: 200px;">
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xs-12">
                                                <table class="table table-striped" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2"><p class ="member-info">Thông tin cá nhân</p></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="spec-title">
                                                                <i class="fa fa-user"></i>
                                                                Họ và tên :
                                                            </td>
                                                            <td class="spec-content">
                                                                <span id="name_field">{{$mem->first_name}} {{$mem->last_name}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="spec-title">
                                                                <i class="fa fa-user"></i>
                                                                Giới tính :
                                                            </td>
                                                            <td class="spec-content">
                                                                <span id="gender_field">@if ($mem->gender)
                                                                  {{$mem->gender}}
                                                                @else
                                                                  Chưa cập nhật
                                                                @endif</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="spec-title">
                                                                <i class="fa fa-home"></i>
                                                                Địa chỉ :
                                                            </td>
                                                            <td class="spec-content">
                                                                <span id="address_field">@if ($mem->address)
                                                                  {{$mem->address}}
                                                                @else
                                                                  Chưa cập nhật
                                                                @endif</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="spec-title">
                                                                <i class="fa fa-phone"></i>
                                                                Số điện thoại :
                                                            </td>
                                                            <td class="spec-content">
                                                                <span id="phone_field">@if ($mem->phone)
                                                                  {{$mem->phone}}
                                                                @else
                                                                  Chưa cập nhật
                                                                @endif</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="spec-title">
                                                                <i class="fa fa-envelope"></i>
                                                                Email :
                                                            </td>
                                                            <td class="spec-content">
                                                                <a href="mailto:{{$mem->email}}">{{$mem->email}}</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                            <button type="button" class="btn btn-warning" id="button-edit-info"><i
                                                    class="glyphicon glyphicon-edit"></i> Chỉnh sửa </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="menu1" class="tab-pane fade">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-md-offset-0">
                                <div class="panel panel-info">
                                    <div class="panel panel-heading">
                                        <h3 class="panel-title" style="font-weight: bold">Danh sách sản phẩm đã đặt</h3>
                                    </div>
                                    <div class="panel panel-body">
                                        <table class="table table-striped table-hover table-list-orders">
                                            <thead>
                                                <tr>
                                                    <th colspan="7"><h4 style="text-align: left;font-weight: bold">Bạn có @if ($data != null)
                                                      {{sizeof($data)}}
                                                    @else
                                                      0
                                                    @endif đơn hàng</h4></th>
                                                </tr>
                                                <tr>
                                                    <th><h5 style="font-weight: bold">Ngày đặt</h5></th>
                                                    <th><h5 style="font-weight: bold">Tên người nhận</h5></th>
                                                    <th><h5 style="font-weight: bold">Địa chỉ</h5></th>
                                                    <th><h5 style="font-weight: bold">Số điện thoại</h5></th>
                                                    <th><h5 style="font-weight: bold">Nội dung</h5></th>
                                                    <th><h5 style="font-weight: bold">Giá</h5></th>
                                                    <th><h5 style="font-weight: bold">Trạng thái</h5></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              if(sizeof($data)){
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
                                                      <td><?php echo $data[$i]->created_date ?></td>
                                                      <td><?php echo $data[$i]->customer_name ?></td>
                                                      <td><?php echo $data[$i]->address ?></td>
                                                      <td><?php echo $data[$i]->phone ?></td>
                                                      <td>
                                                        <?php
                                                        for($j = 0;$j<sizeof($data);$j++){
                                                          if($data[$j]->order_id == $current_order){
                                                            echo $data[$j]->quantity . " " . $data[$j]->brand_name . " " . $data[$j]->product_name;
                                                            echo "<br>";
                                                          }
                                                        }
                                                        ?>
                                                      </td>
                                                      <td>
                                                        <?php
                                                        $total = 0;
                                                        for($j = 0;$j<sizeof($data);$j++){
                                                          if($data[$j]->order_id == $current_order){
                                                            $total += $data[$j]->price*$data[$j]->quantity;
                                                          }
                                                        }
                                                        echo number_format($total);
                                                        echo " VND";
                                                        ?>
                                                      </td>
                                                      <td><?php echo $data[$i]->status ?></td>
                                                  </tr>
                                                  <?php
                                                  $i++;
                                                }
                                              }
                                              while($i<sizeof($data));
                                              }
                                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="menu2" class="tab-pane fade">
                    <div class="container">
                        <div class="row">
                            <div class="col lg-12 col-md-12 col-xs-12 col-md-offset-0">
                                <div class="panel panel-info">
                                    <div class="panel panel-heading">
                                        <div class="panel-title" style="font-weight: bold">Gửi Feedback</div>
                                    </div>
                                    <div class="panel panel-body">
                                      <form id="feedback_form" method="post" action="">
                                        <div class="form-block margin-bottom-15">
                                            <label for="content">Nội dung: </label>
                                            <textarea name="feed" id="content" style="width: 100%" rows="10" required></textarea>
                                        </div>
                                      </form>
                                        <button class="btn btn-success btn-feedback" onclick="send_feedback();">Gửi phản hồi</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('includes.footer')

    <div id="modal-edit-info" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa thông tin cá nhân</h4>
                </div>
                <form enctype="multipart/form-data" id="upload_form" method="post" action="">
                  {{ csrf_field() }}
                <div class="modal-body">

                    <div class="img-select-block">
                        <label>Ảnh đại diện</label>
                        <img id="avatar" src="@if ($mem->avatar != null && $mem->avatar != "")
                          /storage/{{$mem->avatar}}
                        @else
                          img/defaultface.jpg
                        @endif" class="img img-responsive img-circle" alt="" style="height: 100px; width:100px">
                        <input type="file" id="input-select-img-avatar" name="avatar" onchange="loadFile(event)">
                    </div>
                    <div class="form-group">
                        <label>Họ: </label>
                        <input type="text" class="form-control" name="fname" id="input-name" value="{{$mem->first_name}}">
                        <label>tên: </label>
                        <input type="text" class="form-control" name="lname" id="input-name" value="{{$mem->last_name}}">
                    </div>
                    <div class="form-group">
                        <label>Giới tính: </label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="Nam" @if ($mem->gender == "Nam")
                              selected
                            @endif>Nam</option>
                            <option value="Nữ" @if ($mem->gender == "Nữ")
                              selected
                            @endif>Nữ</option>
                            <option value="Khác" @if ($mem->gender == "Khác")
                              selected
                            @endif>Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ: </label>
                        <input type="text" class="form-control" name="address" id="input-address" value="{{$mem->address}}">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại: </label>
                        <input type="text" class="form-control" name="phone" id="input-phone" value="{{$mem->phone}}">
                    </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-success btn-save-info" onclick="edit_info()">Xác nhận chỉnh sửa</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top: 10px">Thoát</button>
                </div>

            </div>
        </div>
    </div>
    <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var loadFile = function(event) {
      var output = document.getElementById('avatar');
      output.src = URL.createObjectURL(event.target.files[0]);
    };

    function edit_info(){

      $.ajax({
         type:'POST',
         url:'/profile/edit',
         dataType:'json',
         processData: false,
         contentType: false,
         data:new FormData($("#upload_form")[0]),
         success:function(data){
           console.log(data.mem);
           var tabledata = JSON.parse(data.mem);
           $('#modal-edit-info').modal('hide');
           swal(
                'Chỉnh sửa thành công',
                "Thông tin của bạn đã được cập nhật",
                'success',
              );
            $('#name_field').html(tabledata[0].first_name + " " + tabledata[0].last_name);
            $('#gender_field').html(tabledata[0].gender);
            $('#address_field').html(tabledata[0].address);
            $('#phone_field').html(tabledata[0].phone);
            $('.userfname').html('<span class="fa fa-user"></span> ' + tabledata[0].last_name + ' <span class="caret"></span>');
            if(tabledata[0].avatar != ""){
              $('#uavatar').attr("src", '/storage/' + tabledata[0].avatar);
            }

         }
      });
    }

    function send_feedback(){
      var content = $('#content').val();
      $.ajax({
         type:'POST',
         url:'/profile/feedback',
         dataType:'json',
         data: {content: content},
         success:function(data){
           console.log(data);
           swal(
                    'Thành công',
                    "Cảm ơn bạn đã gửi phản hồi",
                    'success'
               );
         }
      });
    }
    </script>
</body>
</html>
