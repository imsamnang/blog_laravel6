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
  <ul class="sidebar-menu" data-widget="tree">
    <li class="{{Request::is('admin')?'active':''}}">
      <a href="/admin"><i class="fa fa-link"></i> <span>DASHBOARD</span></a>
    </li>
    <li class="{{Request::is('tags*')?'treeview menu-open':'treeview'}}">
        <a href="#"><i class="fa fa-link"></i> <span>Manage Tags</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display:{{Request::is('tags*')?'block;':'none;'}}">
          <li class="{{Request::is('tags/create')?'active':''}}">
            <a href="{{ route('tags.create') }}"><i class="fa fa-link"></i> Add Tag</a>
          </li>
          <li class="{{Request::is('tags')?'active':''}}">
            <a href="{{ route('tags.index') }}"><i class="fa fa-link"></i> List Tags</a>
          </li>
        </ul>
      </li>
      <li class="{{Request::is('posts*')?'treeview menu-open':'treeview'}}">
        <a href="#"><i class="fa fa-link"></i> <span>Manage Posts</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display:{{Request::is('posts*')?'block;':'none;'}}">
          <li class="{{Request::is('posts/create')?'active':''}}">
            <a href="{{ route('posts.create') }}">Add Post</a>
          </li>
          <li class="{{Request::is('posts')?'active':''}}">
            <a href="{{ route('posts.index') }}">List Posts</a>
          </li>
        </ul>
      </li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>          
  </ul>
  <!-- /.sidebar-menu -->
</section>
 
<!-- /.sidebar -->

