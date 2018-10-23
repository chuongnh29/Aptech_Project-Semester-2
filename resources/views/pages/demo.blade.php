<!--================Menu Area =================-->
<header class="shop_header_area carousel_menu_area">
    <div class="carousel_top_header row m0">
        <div class="container">
            <div class="carousel_top_h_inner">
                <div class="float-md-left">
                    <div class="top_header_left">
                        <div class="selector">
                            <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                <option value='yt' data-image="source/img/icon/vietnam-flag.jpg" data-imagecss="flag yt"
                                        data-title="Vietnam">VI
                                </option>
                                <option value='yu' data-image="source/img/icon/flag-en.png" data-imagecss="flag yu"
                                        data-title="English">EN
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="float-md-right">
                    <div class="top_header_middle">
                        <i class="fa fa-phone"></i> Hotline: <a href="tel:0988211231"><span>+84 988 211 231</span></a>
                        <i class="fa fa-envelope"></i> Email: <a href="mailto:chuongnhd00645@fpt.edu.vn"><span>chuongnhd00645@fpt.edu.vn</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel_menu_inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('home')}}"><img src="source/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="{{route('home')}}" role="button"

                               aria-haspopup="true" aria-expanded="false">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Đồng hồ nam <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{route('producttype')}}">Richard
                                        Mille</a></li>
                                <li class="nav-item"><a class="nav-link" href="checkout.html">Patek Philippe</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.html">Franck Muller</a></li>
                                <li class="nav-item"><a class="nav-link" href="register.html">Rolex</a></li>
                                <li class="nav-item"><a class="nav-link" href="track.html">Hublot</a></li>
                                <li class="nav-item"><a class="nav-link" href="404.html">Tissot</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Đồng hồ nữ <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="">
                                        Hublot</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-3column.html">
                                        Rolex</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-4column.html">
                                        Longines</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-left-sidebar.html">
                                        Omega</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-right-sidebar.html">
                                        Tissot</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-grid-left-sidebar.html">
                                        TAG Heuer</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Giới thiệu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="search_icon"><a href="#"><i class="icon-magnifier icons"></i></a></li>
                        <li class="user_icon"><a href="{{route('login')}}"><i class="icon-user icons"></i></a></li>
                        <li class="cart_cart"><a href="{{route('cart')}}"><i class="icon-handbag icons"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================End Menu Area =================-->