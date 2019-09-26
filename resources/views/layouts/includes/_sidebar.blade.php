<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel (optional) -->
  {{-- <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Alexander Pierce</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div> --}}

  <!-- Sidebar Menu -->
  {{-- <ul class="sidebar-menu" data-widget="tree">
    <li class="{{Request::is('admin')?'active':''}}">
      <a href="/admin"><i class="fa fa-link"></i> <span>DASHBOARD</span></a>
    </li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>

  <li class="{{Request::is('tag_*')?'treeview menu-open':'treeview'}}">
      <a href="#"><i class="fa fa-link"></i> <span>Manage Tags</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu" style="display:{{Request::is('tag_*')?'block;':'none;'}}">
        <li class="{{Request::is('tag_create')?'active':''}}">
          <a href="/tag_create">Add Tag</a>
        </li>
        <li class="{{Request::is('tag_index')?'active':''}}">
          <a href="/tag_index">List Tags</a>
        </li>
      </ul>
    </li>
    <li class="{{Request::is('post_*')?'treeview menu-open':'treeview'}}">
      <a href="#"><i class="fa fa-link"></i> <span>Manage Posts</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu" style="display:{{Request::is('post_*')?'block;':'none;'}}">
        <li class="{{Request::is('post_create')?'active':''}}">
          <a href="/post_create">Add Post</a>
        </li>
        <li class="{{Request::is('post_index')?'active':''}}">
          <a href="/post_index">List Posts</a>
        </li>
      </ul>
    </li>    
  </ul> --}}
  <!-- /.sidebar-menu -->
  <div id="sidebar-left">
    <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
      <ul class="nav main-menu">
        <li class="mm_welcome">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span class="text"> dashboard</span>
          </a>
        </li>
        <li class="mm_products">
          <a class="dropmenu" href="#">
            <i class="fa fa-barcode"></i>
            <span class="text"> products </span>
            <span class="chevron closed"></span>
          </a>
          <ul>
            <li id="products_index">
              <a class="submenu" href="https://sma.tecdiary.com/admin/products">
              <i class="fa fa-barcode"></i>
              <span class="text"> list products</span>
              </a>
            </li>
            <li id="products_add">
              <a class="submenu" href="https://sma.tecdiary.com/admin/products/add">
              <i class="fa fa-plus-circle"></i>
              <span class="text"> add product</span>
              </a>
            </li>          
          </ul>
        </li>
      </ul>
    </div>
  </div>
</section>
<!-- /.sidebar -->
