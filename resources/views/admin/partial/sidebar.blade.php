<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->

            {{-- HOME --}}
            <li class="{{ Request::is('home') ? "active" : ""}}">
                <a href="{{ route('home')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>




            {{-- Customer --}}
            <li class="{{ Request::is('customer') ? "active" : "" }}">
                <a href="{{url('/customer')}}"><i class="fa fa-link"></i> <span>Customers</span> </a>
            </li>

            {{-- Products --}}
            <li class="{{ Request::is('product', 'admin/add_news','admin/update_news','admin/view_news/*','admin/edit_news/*') ? "active" : "" }}">
                <a href="{{url('product')}}"><i class="fa fa-newspaper-o"></i> <span>Products</span></a>
            </li>

            {{-- Orders --}}
            <li class="{{ Request::is('orders', 'admin/add_admission','admin/update_admission','admin/view_admission/*','admin/edit_admission/*') ? "active" : "" }}">
              <a href="{{ url('/orders') }}"><i class="fa fa-institution"></i> <span>Orders</span></a>
              
            </li>

            {{-- Collections --}}
            <li class="{{ Request::is('collections', 'admin/add_course_offering','admin/update_course_offering','admin/view_course_offering') ? "active" : "" }}">
                <a href="{{url('/collections')}}"><i class="fa fa-list"></i> <span>Collections</span></a>
            </li>
            
            {{-- Accounts --}}
            <li class="{{ Request::is('accounts', 'admin/add_scholarship','admin/update_scholarship','admin/view_scholarship/*','admin/edit_scholarship/*') ? "active" : "" }}">
                <a href="{{url('/accounts')}}"><i class="fa fa-th-list"></i> <span>Accounts</span></a>
            </li>

            <!-- 
            {{-- Administrative --}}
            <li class="{{ Request::is('admin/administrative', 'admin/add_administrative','admin/update_administrative','admin/view_administrative/*','edit_administrative/*') ? "active" : "" }}">
                <a href="{{url('admin/administrative')}}"><i class="fa fa-id-badge"></i> <span>Administrative</span></a>
            </li>
            
            {{-- Alumni --}}
            <li class="{{ Request::is('admin/alumni', 'admin/add_alumni','admin/update_alumni','admin/view_alumni','admin/edit_alumni/*') ? "active" : "" }}">
                <a href="{{url('admin/alumni')}}"><i class="fa fa-id-card"></i> <span>Alumni</span></a>
            </li>
            
            {{-- Arabic Department --}}
            <li class="{{ Request::is('admin/arabic_department', 'admin/add_arabic_department','admin/update_arabic_department','admin/view_arabic_department/*','admin/edit_arabic_department/*') ? "active" : "" }}">
                <a href="{{url('admin/arabic_department')}}"><i class="fa fa-id-card"></i> <span>Arabic Department</span></a>
            </li>

            {{-- Contact Us --}}
            <li class="{{ Request::is('admin/contact', 'admin/add_contact','admin/update_contact','admin/edit_contact/*') ? "active" : "" }}">
                <a href="{{url('admin/contact')}}"><i class="fa fa-id-card"></i> <span>Contact Us</span></a>
            </li> -->
    
          {{--  <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="layout/top-nav.html"><i class="fa fa-circle-o"></i> Logo</a></li>
                <li><a href="layout/boxed.html"><i class="fa fa-circle-o"></i> Users</a></li>
                <li><a href="layout/fixed.html"><i class="fa fa-circle-o"></i> Informations</a></li>
              </ul>
            </li> --}}
            
            
          
          </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

