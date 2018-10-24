@extends('master')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="solid_banner_area">
        <div class="container">
            <div class="solid_banner_inner">
                <h3>Đăng nhập</h3>
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a>Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================login Area =================-->
    <section class="login_area p_100">
        <div class="container">
            <div class="login_inner">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="login_title">
                            <h2>đăng nhập vào tài khoản của bạn</h2>
                        </div>
                        <form class="login_form row">
                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="text" placeholder="Tên đăng nhập">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="password" placeholder="Mật khẩu">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Ghi nhớ đăng nhập</label>
                                    <div class="check"></div>
                                </div>
                                <a href="{{route('register')}}"><h4>Đăng ký ngay</h4></a>

                            </div>
                            <div class="col-lg-12 form-group">
                                <button type="submit" value="submit" class="btn subs_btn form-control">đăng nhập</button>
                                <a href="{{ route('loginBySocial',['social'=>'facebook']) }}"></a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>

                </div>
            </div>
        </div>
    </section>
    <!--================End login Area =================-->
@endsection