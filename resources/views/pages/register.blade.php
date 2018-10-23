@extends('master')

@section('title')
    Đăng ký
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="solid_banner_area">
        <div class="container">
            <div class="solid_banner_inner">
                <h3>Đăng ký</h3>
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a>Đăng ký</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <section class="login_area p_100">
        <div class="container">
            <div class="login_inner">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="login_title">
                            <h2>đăng ký tài khoản mới</h2>
                        </div>
                        <form class="login_form row">
                            <div class="col-lg-6 form-group">
                                <input class="form-control" type="text" placeholder="Tên tài khoản">
                            </div>
                            <div class="col-lg-6 form-group">
                                <input class="form-control" type="email" placeholder="Email">
                            </div>
                            <div class="col-lg-6 form-group">
                                <input class="form-control" type="text" placeholder="Họ tên">
                            </div>
                            <div class="col-lg-6 form-group">
                                <input class="form-control" type="text" placeholder="Số điện thoại">
                            </div>
                            <div class="col-lg-6 form-group">
                                <input class="form-control" type="password" placeholder="Mật khẩu">
                            </div>
                            <div class="col-lg-6 form-group">
                                <input class="form-control" type="password" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-lg-6 form-group" style="align-items: center">
                                <button type="submit" value="submit" class="btn subs_btn form-control">đăng ký
                                </button>
                            </div>
                            <div class="col-lg-6 form-group" style="align-items: center">
                                <a href="{{route('login')}}">
                                    <button type="button" value="login" class="btn subs_btn form-control">đăng nhập
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    </section>
    <!--================End login Area =================-->
@endsection