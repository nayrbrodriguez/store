<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{url('admin/dashboard')}}" class="logo"><b>Admin</b>MMI</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                

                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    
                        <!-- The user image in the navbar-->
                        {{-- <div style="padding-top: 15px; padding-right: 15px; color:  white; "> --}}
                        {{-- </div> --}}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="{{ url('/uploads/avatars', Auth::user()->avatar) }}" class="user-image" alt="User Image"/> -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
                       
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <!-- {{-- <img src="{{ asset("/bower_components/adminlte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" /> --}} -->

                           
                                <!-- <img src="{{ url('/uploads/avatars', Auth::user()->avatar) }}" style="width: 90px; height: 90px;" class="img-circle" alt="User Image"/> -->
                            

                            <p>
                                {{ Auth::user()->name }} - Administrator
                                
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
                                 <a href="{{ url('/admin/profile')}}" class="btn btn-default btn-flat">Profile</a>
                                 {{-- <a href="{{ url('admin/reset', Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a> --}}
                            </div>
                            <div class="pull-right">
                                
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                            Sign out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>