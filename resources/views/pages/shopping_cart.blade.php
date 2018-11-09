@extends('master')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="solid_banner_area">
        <div class="container">
            <div class="solid_banner_inner">
                <h3>Giỏ hàng</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="shopping-cart2.html">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Shopping Cart Area =================-->
    <section class="shopping_cart_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart_product_list">
                        <h3 class="cart_single_title">Giỏ hàng của bạn</h3>
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <img src="public/source/assets/dest/img/icon/close-icon.png" alt="">
                                    </th>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="public/source/img/product/cart-product/cart-1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4>Mens Nike Bag</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p>$ 150,000</p></td>
                                    <td>
                                        <div class="quantity">
                                            <div class="custom">
                                                <button onclick="var result = document.getElementById('sst2'); var sst2 = result.value; if( !isNaN( sst2 ) &amp;&amp; sst2 > 1) result.value--;return false;"
                                                        class="reduced items-count" type="button"><i
                                                            class="icon_minus-06"></i></button>
                                                <input type="text" name="qty" id="sst2" maxlength="12" value="1"
                                                       title="Quantity:" class="input-text qty" disabled>
                                                <button onclick="var result = document.getElementById('sst2'); var sst2 = result.value; if( !isNaN( sst2 )) result.value++;return false;"
                                                        class="increase items-count" type="button"><i
                                                            class="icon_plus"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p>$ 1,150,000</p></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <img src="public/source/assets/dest/img/icon/close-icon.png" alt="">
                                    </th>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="public/source/img/product/cart-product/cart-2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4>Mens Nike Bag</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p>$ 150</p></td>
                                    <td>
                                        <div class="quantity">
                                            <div class="quantity">
                                                <div class="custom">
                                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1) result.value--;return false;"
                                                            class="reduced items-count" type="button"><i
                                                                class="icon_minus-06"></i></button>
                                                    <input type="text" name="qty" id="sst" maxlength="12" value="1"
                                                           title="Quantity:" class="input-text qty">
                                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                            class="increase items-count" type="button"><i
                                                                class="icon_plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p>$ 250</p></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cupon_box">
                    <h3 class="cart_single_title">Discount Cupon</h3>
                    <div class="cupon_box_inner">
                    <input type="text" placeholder="Enter your code here">
                    <button type="submit" class="btn btn-primary subs_btn">apply cupon</button>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="total_amount_area">

                        <div class="cart_totals">
                            <h3 class="cart_single_title">Chi tiết hóa đơn</h3>
                            <div class="cart_total_inner">
                                <ul>
                                    <li><a href="#"><span>Tổng tiền hóa đơn</span> $ 400.00</a></li>
                                    <li><a href="#"><span>Vận chuyển</span> Miễn phí</a></li>
                                    <li><a href="#"><span>Tổng cộng</span> $ 400.00</a></li>
                                </ul>
                            </div>
                            {{--<button type="submit" class="btn btn-primary update_btn">cập nhật</button>--}}
                            <button type="submit" class="btn btn-primary checkout_btn">tiến hành thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Shopping Cart Area =================-->
@endsection