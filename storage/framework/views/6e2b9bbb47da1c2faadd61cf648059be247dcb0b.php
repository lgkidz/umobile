<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="padding:0px;margin-left:50px ;margin-right:5px" class="navbar-brand" href="/"><h1 style="color:white;line-height:30px;">Umobile</h1></a>

        </div>
        <div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <div class="input-group" style="width: 300px;height:70px;padding:18px;">
                            <input class="form-control" type="search" placeholder="Bạn muốn tìm gì?">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        </div>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle nav-text" href="/products"><span class="fa fa-mobile" style="font-size:18px"> </span> Điện thoại
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li class="dropli"><a href="/products/<?php echo e($b->brand_name); ?>"><?php echo e($b->brand_name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <li><a class="nav-text"><span class="fa fa-gift"> </span> Ưu đãi</a></li>
                    <li><a class="nav-text"><span class="fa fa-newspaper-o"> </span> Tin tức</a></li>
                    <li><a class="nav-text"><span class="fa fa-comments-o"> </span> Hỗ trợ</a></li>
                    <?php if(session('member_id')): ?>
                      <li class="dropdown"><a class="dropdown-toggle nav-text userfname" data-toggle="dropdown"><span class="fa fa-user"></span> <?php echo e(session('last_name')); ?>

                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li class="dropli"><a href="/profile">Trang cá nhân</a></li>
                              <li class="dropli"><a href="/logout">Đăng xuất</a></li>
                          </ul>
                      </li>
                    <?php else: ?>
                        <li><a class="nav-text" id="login"><span class="fa fa-user"> </span> Đăng nhập</a></li>
                    <?php endif; ?>
                    <li><a href="/cart" class="nav-text"><span class="fa fa-shopping-cart"><span class="badge"><?php if(session('cart') != null): ?>
                      <?php echo e(sizeof(session('cart'))); ?>

                    <?php else: ?>
                      0
                    <?php endif; ?></span></span> Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
