<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
  <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
      <li class="start {{ Route::currentRouteNamed('admin.dashboard.index') ? 'active' : '' }} ">
        <a href="{{ route('admin.dashboard.index') }}">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
        </a>
      </li>
      <li class="{{ Route::currentRouteNamed('admin.categories.index', 'admin.categories.create') ? 'active' : '' }}">
        <a href="{{ route('admin.categories.index') }}">
        <i class="fa fa-list-alt"></i>
        <span class="title">Category</span>
        <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{ route('admin.categories.create') }}">
            <i class="fa fa-plus"></i>
            New</a>
          </li>
          <li>
            <a href="{{ route('admin.categories.index') }}">
            <i class="fa fa-list"></i>
            List Categories</a>
          </li>
        </ul>
      </li>
      <li class="{{ Route::currentRouteNamed('admin.products.index', 'admin.products.create') ? 'active' : '' }}">
        <a href="{{ route('admin.products.index') }}">
        <i class="icon-handbag"></i>
        <span class="title">Product</span>
        <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{ route('admin.products.create') }}">
            <i class="fa fa-plus"></i>
            New</a>
          </li>
          <li>
            <a href="{{ route('admin.products.index') }}">
            <i class="fa fa-list"></i>
            List Products</a>
          </li>
        </ul>
      </li>
      <li class="{{ Route::currentRouteNamed('admin.order.index') ? 'active' : '' }}">
        <a href="{{ route('admin.order.index') }}">
            <i class="icon-bell"></i>
            <span class="title">Order</span>
        </a>
      </li>
      <li class="{{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}">
        <i class="icon-user"></i>
        <span class="title">User</span>
        </a>
      </li>
      <li class="{{ Route::currentRouteNamed('admin.banners.index') ? 'active' : '' }}">
        <a href="">
        <i class="fa fa-picture-o"></i>
        <span class="title">Banner</span>
        </a>
        <ul class="sub-menu">
        <li>
            <a href="{{ route('admin.banners.create') }}">
            <i class="fa fa-plus"></i>
            New</a>
          </li>
          <li>
            <a href="{{ route('admin.banners.index') }}">
            <i class="fa fa-list"></i>
            List Banners</a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>
<!-- END SIDEBAR -->
