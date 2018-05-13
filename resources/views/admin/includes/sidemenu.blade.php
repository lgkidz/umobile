<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/images/nyan.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo session('admin_real_name');?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{Request::is('admin/dashboard')?'active':''}}">
        <a href="/admin/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="{{Request::is('admin/admincontrol')?'active':''}}">
        <a href="/admin/admincontrol">
          <i class="fa fa-user-circle"></i> <span>Quản lý admin</span>
        </a>
      </li>
      <li class="{{Request::is('admin/brands')?'active':''}}">
        <a href="/admin/brands">
          <i class="fa fa-registered"></i> <span>Quản lý hãng</span>
        </a>
      </li>
      <li class="{{Request::is('admin/products')?'active':''}}">
        <a href="/admin/products">
          <i class="fa fa-cubes"></i> <span>Quản lý sản phẩm</span>
        </a>
      </li>
      <li class="{{Request::is('admin/orders')?'active':''}}">
        <a href="/admin/orders">
          <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
        </a>
      </li>
      <li class="{{Request::is('admin/members')?'active':''}}">
        <a href="/admin/members">
          <i class="fa fa-users"></i> <span>Quản lý thành viên</span>
        </a>
      </li>
      <li class="{{Request::is('admin/feedback')?'active':''}}">
        <a href="/admin/feedback">
          <i class="fa fa-thumbs-up"></i> <span>Quản lý feedback & mailing</span>
        </a>
      </li>
      <li>
        <a href="https://dashboard.tawk.to/#/dashboard">
          <i class="fa fa-comments"></i> <span>Hỗ trợ trực tuyến</span>
        </a>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
