@extends('master')
@section('title')
    Đồng hồ chính hãng
@endsection

@section('content')

    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current"><a href="#">Đồng hồ chính hãng</a></li>
                    {{--<li class="current"><a href="#">{{$loai_sp->name}}</a></li>--}}
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->
    <!--================Categories Product Area =================-->
    <section class="categories_product_main p_80">
        <div class="container">
            <div class="categories_main_inner">
                <div class="row row_disable">
                    <div class="col-lg-9 float-md-right">
                        <div class="showing_fillter">
                            <div class="row m0">
                                <div class="first_fillter">
                                    <h4>Hiện có {{count($sp_theoloai)}} sản phẩm</h4>
                                </div>
                                <div class="secand_fillter">
                                    <h4>SẮP XẾP THEO:</h4>
                                    <select class="selectpicker">
                                        <option>Giá giảm dần</option>
                                        <option>Giá tăng dần</option>
                                        <option>Tên sản phẩm (từ A - Z)</option>
                                        <option>Tên sản phẩm (từ Z - A)</option>
                                    </select>
                                </div>
                                <div class="third_fillter">
                                </div>
                                <div class="four_fillter">
                                    <h4>HIỂN THỊ:</h4>
                                    <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                    <a href="#"><i class="icon_grid-3x3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="categories_product_area">
                            <div class="row">
                                @foreach($sp_theoloai as $sp)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <img src="public/source/img/product/{{$sp->image}}" alt=""
                                                     width="270px"
                                                     height="320px">
                                                <div class="new">
                                                    <p>New</p>
                                                </div>
                                                @if($sp->promotion_price != 0)
                                                    <div class="sale">
                                                        <p>Sale</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                    <li><a class="add_cart_btn" href="{{route('addtocart', $sp->id)}}">Thêm giỏ hàng</a></li>
                                                    <li><a class="add_cart_btn" href="{{route('detail', $sp->id)}}">Chi
                                                            tiết</a>
                                                    </li>
                                                </ul>
                                                <h4>{{$sp->name}}</h4>
                                                <h5>@if($sp->promotion_price != 0)
                                                        $ {{number_format($sp->promotion_price)}}
                                                        <del>$ {{number_format($sp->unit_price)}}</del>
                                                    @else
                                                        $ {{number_format($sp->unit_price)}}
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example" class="pagination_area">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>

                                    <li class="page-item next"><a class="page-link" href="#"><i
                                                    class="fa fa-angle-right"
                                                    aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 float-md-right">

                        <div class="categories_sidebar">
                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>Đồng hồ nam</h3>
                                </div>
                                <ul class="navbar-nav">
                                    @foreach($sp_nam as $nam)
                                        <li class="nav-item">

                                            <a class="nav-link" href="{{route('donghonam')}}">{{$nam->name}}
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>Đồng hồ nữ</h3>
                                </div>
                                <ul class="navbar-nav">
                                    @foreach($sp_nu as $nu)
                                        <li class="nav-item">

                                            <a class="nav-link" href="#">{{$nu->name}}
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="l_widgest l_fillter_widget">
                                <div class="l_w_title">
                                    <h3>Filter section</h3>
                                </div>
                                <div id="slider-range" class="ui_slider"></div>
                                <label for="amount">Price:</label>
                                <input type="text" id="amount" readonly>
                            </aside>

                            <aside class="l_widgest l_feature_widget">
                                <div class="l_w_title">
                                    <h3>Featured Products</h3>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="public/source/img/product/featured-product/f-p-5.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Jeans with <br/> Frayed Hems</h4>
                                        <h5>$45.05</h5>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="public/source/img/product/featured-product/f-p-6.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Crysp Denim<br/>Montana</h4>
                                        <h5>$45.05</h5>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Categories Product Area =================-->



@endsection