<!--================Top Header Area =================-->
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="top_header_left">
                    <div class="selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="public/source/assets/dest/img/icon/flag-vi.jpg"
                                    data-imagecss="flag yt"
                                    data-title="Vietnam">Vietnam
                            </option>
                            <option value='yu' data-image="public/source/assets/dest/img/icon/flag-en.png"
                                    data-imagecss="flag yu"
                                    data-title="English">English
                            </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Search">
                        <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"><i class="icon-magnifier"></i></button>
                                </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="top_header_middle">
                    <a href="tel:0988211231"><i class="fa fa-phone"></i> Hotline: <span>+84 988 211 231</span></a>
                    <a href="mailto:chuongnhd00645@fpt.edu.v"><i class="fa fa-envelope"></i> Email: <span>chuongnhd00645@fpt.edu.vn</span></a>
                    <a href="{{route('home')}}"><img src="public/source/assets/dest/img/logo.png" alt="" height="74px"
                                                     width="400px"></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="top_right_header">
                    <ul class="header_social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                    <ul class="top_right">
                        <li class="user"><a href="{{route('login')}}"><i class="icon-user icons"></i></a></li>
                        <li class="cart"><a href="{{route('cart')}}"><i class="icon-handbag icons"></i></a></li>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="public/public/source/assets/dest/img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center">

                <ul class="navbar-nav" style="alignment: center;">
                    <li class="nav-item dropdown submenu active">
                        <a class="nav-link dropdown-toggle" href="{{route('home')}}" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            Trang chủ
                        </a>

                    </li>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Đồng hồ nam <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($loai_sp_nam as $loai)
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{route('producttype', $loai->id_name)}}">{{$loai->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Đồng hồ nữ <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($loai_sp_nu as $loai)
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{route('producttype', $loai->id_name)}}">
                                        {{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================End Menu Area =================-->