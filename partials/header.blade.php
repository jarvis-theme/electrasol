<header id="header">
    <div class="header-middle">
        <div class="container">
            <div class="header_top">
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <div class="logo pull-left">
                            @if(@getimagesize(url(logo_image_url())))
                            <a href="{{ url('home') }}">
                                <img class="img-responsive" id="logos" src="{{url(logo_image_url())}}" alt="Logo" /></a>
                            </a>
                            @else
                            <a href="{{url('home')}}"><h1 class="text-logo">{{ shortText(Theme::place('title'),26) }}</h1></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-8" align="right">
                        <div class="search_box">
                            <form action="{{url('search')}}" method="post">
                                <input class="inputsearch" type="text" placeholder="Cari Produk" name="search" required />
                            </form>
                        </div>
                        <div id="shoppingcartplace">
                            {{shopping_cart()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <a class="navbar-brand visible-xs mobilemenu"><strong>MENU</strong></a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <nav aria-expanded="true" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="{{url('home')}}">Home</a>
                                </li>

                                @foreach(list_category() as $key=>$menu)
                                    @if($menu->parent=='0')
                                        @if(count($menu->anak) < 1)
                                        <li>
                                            <a href="{{category_url($menu)}}">{{$menu->nama}}</a>
                                        @else
                                        <li class="dropdown">
                                            <a href="{{category_url($menu)}}" class="dropdown-toggle" data-toggle="dropdown">
                                                {{$menu->nama}} <b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($menu->anak as $key => $submenu)
                                                <li><a href="{{category_url($submenu)}}">{{$submenu->nama}}</a></li>
                                                    @if(count($submenu->anak->count()) > 0)
                                                    <ul>
                                                        @foreach($submenu->anak as $submenu2)
                                                            @if($submenu2->parent == $submenu->id)
                                                            <li class="submenu2">
                                                                <a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                        </li>
                                    @endif
                                @endforeach  
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                @if( is_login() )
                                <li class="grey"><a class="login" href="{{url('logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                <li class="grey"><a class="signin" href="{{url('member')}}"><i class="fa fa-user"></i> {{user()->nama}}</a></li>
                                @else
                                <li class="grey"><a class="login" href="{{url('member')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <li class="grey"><a class="signin" href="{{url('member/create')}}"><i class="fa fa-user"></i> Daftar</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="advertisement">
    @foreach(horizontal_banner() as $top_banner)
    <div class="container">
        <img src="{{url(banner_image_url($top_banner->gambar))}}" alt="Info Promo" />
    </div>
    @endforeach
</section>        
