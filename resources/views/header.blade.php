<!--================Top Header Area =================-->
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="top_header_left">
                    <div class="selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;" onchange="location = this.value;">
                            <option value='/LuxuryWatchShop/change-language/vi' data-image="public/source/assets/dest/img/icon/flag-vi.jpg"
                                    data-imagecss="flag yt"
                                    data-title="Vietnam" {{\Illuminate\Support\Facades\Session::get('locale')=='vi'?'selected':''}}>Vietnam
                            </option>
                            <option value='/LuxuryWatchShop/change-language/en' data-image="public/source/assets/dest/img/icon/flag-en.png"
                                    data-imagecss="flag yu"
                                    data-title="English" {{\Illuminate\Support\Facades\Session::get('locale')=='en'?'selected':''}}>English
                            </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <form role="search" method="get" action="{{route('search')}}">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit"><i class="icon-magnifier"></i></button>
                                </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="top_header_middle">
                    <a href="tel:0988211231"><i class="fa fa-phone"></i> Hotline: <span>+84 988 666 999</span></a>
                    <a href="mailto:chuongnhd00645@fpt.edu.v"><i class="fa fa-envelope"></i> Email: <span>ctcgroup@fpt.edu.vn</span></a>
                    <a href="{{route('home')}}"><img src="public/source/assets/dest/img/logo.png" alt="" height="74px"
                                                     width="400px"></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="top_right_header">
                    <li class="account">
                        @if(Auth::check())
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>
                                Tài khoản của tôi
                                <i class="fa fa-angle-down"></i>
                            </a>
                        @else
                            <a href="#">
                                Đăng nhập | Đăng ký
                                <i class="fa fa-angle-down"></i>
                            </a>
                        @endif

                        <ul class="account_selection">
                            @if(Auth::check())
                                <li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng
                                        nhập</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng
                                        xuất</a></li>
                            @else
                                <li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng
                                        nhập</a></li>
                                <li><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng
                                        ký</a></li>
                            @endif
                        </ul>
                    </li>
                    <ul class="top_right">
                        <li class="cart"><a href="{{route('cart')}}"><i class="icon-handbag icons"><span
                                            class="cart_quantity">10</span></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Top Header Area =================-->

<!--================Menu Area =================-->
<header class="shop_header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center">

                <ul class="navbar-nav" style="alignment: center;">
                    <li class="nav-item dropdown submenu active">
                        <a class="nav-link dropdown-toggle" href="{{route('home')}}" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            {{__('message.home')}}
                        </a>

                    </li>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="{{route('donghonam')}}" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            {{__('message.menwatch')}}
                        </a>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span><i class="fa fa-angle-down down_arrow" aria-hidden="true"></i></span></a>
                        <ul class="dropdown-menu">
                            @foreach($loai_sp_nam as $loai)
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{route('producttype', $loai->name_id)}}">{{$loai->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="{{route('donghonu')}}" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            Đồng hồ nữ
                        </a>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span><i class="fa fa-angle-down " aria-hidden="true"></i></span></a>
                        <ul class="dropdown-menu">
                            @foreach($loai_sp_nu as $loai)
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{route('producttype', $loai->name_id)}}">
                                        {{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">Giới thiệu</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================End Menu Area =================-->