<nav class="navbar navbar-default navbar-fixed-top menu" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-centered">
                <img src="{{URL::asset('images/others/logo-all.png')}}" class="img-responsive"
                     alt="">
            </div>
            <div class="textlogo">Bee Bracelet</div>
        </div>

        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('/home')}}" class="tenmenu">Home</a></li>
                <li><a href="#" class="tenmenu">Best Seller</a></li>
                <li><a href="#" class="tenmenu">New Arrivals</a></li>
                <li><a href="#" class="tenmenu">Contact</a></li>
                <li><a href="{{url('/collection')}}" class="tenmenu">All Product</a></li>
                <li>
                    <a href="{{$contact['facebook']}}" target="_blank">
                        <i class="fa fa-facebook-official"></i>
                    </a>
                </li>
                <li>
                    <a href="{{$contact['instagram']}}" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                @auth
                    @if(Auth::user()->level == 1)
                        <li>
                            <a href="{{route('orders')}}" target="_blank">
                                <i class="fa fa-user-circle"></i>
                            </a>
                        </li>
                    @endif
                @endauth
                <li>
                    <a data-toggle="modal" href='#modal-contact' id="showModel">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>