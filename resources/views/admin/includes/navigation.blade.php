<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}" target="_blank">Admin - Bee Bracelet</a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                </li>
                <li>
                    <a href="{{route('users')}}">
                        <i class="fa fa-user fa-fw"></i> Admin
                    </a>
                </li>
                <li>
                    <a href="{{route('logs')}}">
                        <i class="fa fa-save fa-fw"></i> Log
                    </a>
                </li>
                <li>
                    <a href="{{route('orders')}}">
                        <i class="fa fa-envelope-o fa-fw"></i> Orders
                    </a>
                </li>
                <li>
                    <a href="{{route('sliders')}}">
                        <i class="fa fa-photo fa-fw"></i> Sliders
                    </a>
                </li>
                <li>
                    <a href="{{route('sellers')}}">
                        <i class="fa fa-dashboard fa-fw"></i> Best Sellers
                    </a>
                </li>
                <li>
                    <a href="{{route('products')}}">
                        <i class="fa fa-camera-retro fa-fw"></i> Products
                    </a>
                </li>
                <li>
                    <a href="{{route('mini_products')}}">
                        <i class="fa fa-table fa-fw"></i> Mini Products
                    </a>
                </li>
                <li>
                    <a href="{{route('contacts')}}">
                        <i class="fa fa-list-alt fa-fw"></i> Contacts
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>