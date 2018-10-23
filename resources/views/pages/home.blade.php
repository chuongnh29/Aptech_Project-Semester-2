@extends('master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!--================Home Carousel Area =================-->
    <section class="home_carousel_area">
        <div class="home_carousel_slider owl-carousel">
            @foreach($slide as $sl)
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="public/source/img/slide/{{$sl->image}}" alt="" height="384px" width="660px">
                        <div class="carousel_hover">
                            <h4>{{$sl->name}}</h4>
                            <h3>{{$sl->description}}</h3>
                            <a class="discover_btn" href="#">khám phá ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--================End Home Carousel Area =================-->

    <!--================Latest Product isotope Area =================-->
    <section class="fillter_latest_product">
        <div class="container">
            <div class="single_c_title">
                <h2>SẢN PHẨM MỚI NHẤT</h2>
            </div>
            <div class="fillter_l_p_inner">
                <ul class="fillter_l_p">
                    <li class="active" data-filter="*"><a href="#">đồng hồ nam</a></li>
                    <li data-filter=".woman"><a href="#">đồng hồ nữ</a></li>
                </ul>
                <div class="row isotope_l_p_inner">
                    @foreach($new_product as $new)
                        <div class="col-lg-3 col-md-4 col-sm-6 woman bags">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                    <img class="img-fluid" src="public/source/img/product/{{$new->image}}" alt=""
                                         width="270px"
                                         height="320px">
                                    <h5 class="new">New</h5>
                                    @if($new->promotion_price != 0)
                                        <h5 class="sale">Sale</h5>
                                    @endif
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                        <li><a class="add_cart_btn" href="#">Thêm giỏ hàng</a></li>
                                        <li><a class="add_cart_btn" href="#">Chi tiết</a></li>
                                    </ul>
                                    <h4>{{$new->name}}</h4>
                                    <h5>@if($new->promotion_price != 0)
                                            <del>$ {{number_format($new->unit_price)}}</del>
                                            $ {{number_format($new->promotion_price)}}
                                        @else
                                            $ {{number_format($new->unit_price)}}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--================End Latest Product isotope Area =================-->

    <!--================Our Latest Product Area =================-->
    <section class="our_latest_product">
        <div class="container">
            <div class="s_m_title">
                <h2>SẢN PHẨM GIẢM GIÁ</h2>
            </div>
            <div class="l_product_slider owl-carousel">
                @foreach($new_product as $new)
                    <div class="item">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="public/source/img/product/{{$new->image}}" alt="">
                                @if($new->promotion_price != 0)
                                    <h5 class="sale">Sale</h5>
                                @endif
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li><a class="add_cart_btn" href="#">Thêm giỏ hàng</a></li>
                                    <li><a class="add_cart_btn" href="#">Chi tiết</a></li>
                                </ul>
                                <h4>{{$new->name}}</h4>
                                <h5>@if($new->promotion_price != 0)
                                        <del>$ {{number_format($new->unit_price)}}</del>
                                        $ {{number_format($new->promotion_price)}}
                                    @else
                                        $ {{number_format($new->unit_price)}}
                                    @endif
                                </h5>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================End Our Latest Product Area =================-->

    <!--================Product_listing Area =================-->
    <section class="product_listing_area">
        <div class="container">
            <div class="row p_listing_inner">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6 col-sm-8">
                            <div class="p_list_text">
                                <h3>Siêu cấp</h3>
                                <ul>
                                    <li><a href="#">Down Jackets</a></li>
                                    <li><a href="#">Hoodies</a></li>
                                    <li><a href="#">Suits</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Casual Pants</a></li>
                                    <li><a href="#">Sunglass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                            <div class="p_list_img">
                                <img src="public/source/img/Patek Philippe.jpg" alt="" height="300px" width="200px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6 col-sm-8">
                            <div class="p_list_text">
                                <h3>Cao cấp</h3>
                                <ul>
                                    <li><a href="#">Down Jackets</a></li>
                                    <li><a href="#">Hoodies</a></li>
                                    <li><a href="#">Suits</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Casual Pants</a></li>
                                    <li><a href="#">Sunglass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                            <div class="p_list_img">
                                <img src="public/source/img/Richard Mille.jpg" alt="" height="300px" width="200px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6 col-sm-8">
                            <div class="p_list_text">
                                <h3>Trung cấp</h3>
                                <ul>
                                    <li><a href="#">Down Jackets</a></li>
                                    <li><a href="#">Hoodies</a></li>
                                    <li><a href="#">Suits</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Casual Pants</a></li>
                                    <li><a href="#">Sunglass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                            <div class="p_list_img">
                                <img src="public/source/img/Hublot.jpg" alt="" height="300px" width="200px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product_listing Area =================-->

    <!--================Featured Product Area =================-->
    <section class="feature_product_area">
        <div class="container">
            <div class="f_p_inner">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="f_product_left">
                            <div class="s_m_title">
                                <h2>Sản phẩm nổi bật</h2>
                            </div>
                            <div class="f_product_inner">
                                @foreach($featured_product as $featured)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="public/source/img/product/{{$featured->image}}" alt=""
                                                 height="100px" width="70px">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$featured->name}}</h4>
                                            <h5>$ {{number_format($featured->promotion_price)}}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="fillter_slider_inner">
                            <ul class="portfolio_filter">
                                <li class="active" data-filter="*"><a href="#">ĐỒNG HỒ NAM</a></li>
                                <li data-filter=".woman"><a href="#">ĐỒNG HỒ NỮ</a></li>
                            </ul>
                            <div class="fillter_slider owl-carousel">
                                @foreach($new_product as $new)
                                    <div class="item shoes">
                                        <div class="fillter_product_item bags">
                                            <div class="f_p_img">
                                                <img src="public/source/img/product/{{$new->image}}" alt="">
                                                @if($new->promotion_price != 0)
                                                    <h5 class="sale">Sale</h5>
                                                @endif
                                            </div>
                                            <div class="f_p_text">
                                                <h5>{{$new->name}}</h5>
                                                <h4>@if($new->promotion_price != 0)
                                                        <del>$ {{number_format($new->unit_price)}}</del>
                                                        $ {{number_format($new->promotion_price)}}
                                                    @else
                                                        $ {{number_format($new->unit_price)}}
                                                    @endif
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Featured Product Area =================-->

    <!--================Form Blog Area =================-->
    <section class="from_blog_area">
        <div class="container">
            <div class="from_blog_inner">
                <div class="c_main_title">
                    <h2>From The Blog</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="from_blog_item">
                            <img class="img-fluid" src="public/source/assets/dest/img/blog/from-blog/f-blog-1.jpg"
                                 alt="">
                            <div class="f_blog_text">
                                <h5>fashion</h5>
                                <p>Neque porro quisquam est qui dolorem ipsum</p>
                                <h6>21.09.2017</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="from_blog_item">
                            <img class="img-fluid" src="public/source/assets/dest/img/blog/from-blog/f-blog-2.jpg"
                                 alt="">
                            <div class="f_blog_text">
                                <h5>fashion</h5>
                                <p>Neque porro quisquam est qui dolorem ipsum</p>
                                <h6>21.09.2017</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="from_blog_item">
                            <img class="img-fluid" src="public/source/assets/dest/img/blog/from-blog/f-blog-3.jpg"
                                 alt="">
                            <div class="f_blog_text">
                                <h5>fashion</h5>
                                <p>Neque porro quisquam est qui dolorem ipsum</p>
                                <h6>21.09.2017</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Form Blog Area =================-->
@endsection