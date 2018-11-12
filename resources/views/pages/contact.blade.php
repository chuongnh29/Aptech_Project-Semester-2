@extends('master')
@section('title')
    Liên hệ
@endsection
@section('content')
    <!--================Categories Banner Area =================-->
    <section class="solid_banner_area">
        <div class="container">
            <div class="solid_banner_inner">
                <h3>Liên hệ</h3>
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a>Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <section class="get_in_touch_area p_100">
        <div class="container">
            <div class="row get_touch_inner">
                <div class="row contact_details">
                    <div class="row info_option">
                        <div class="row media contact_col_1">
                            <div class="d-flex">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <p>Detech Building, 8A Tôn Thất Thuyết<br/>Mỹ Đình 2, Nam Từ Liêm, Hà Nội.</p>
                            </div>
                        </div>

                        <div class="row media contact_col_1">
                            <div class="d-flex">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <a href="tel:+1109171234567">+84 988 888 666</a>
                                <a href="tel:+1101911897654">+84 988 666 999</a>
                            </div>
                        </div>

                        <div class="row media contact_col_1">
                            <div class="d-flex">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <a href="mailto:luxurywatch94@gmail.com">luxurywatch94@gmail.com</a>
                                <a href="mailto:luxurywatch94@gmail.com">luxurywatch94@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-6 col-md-6 maps_option">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1279.185515216312!2d105.7811353948998!3d21.028648064952094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3260b1a8b%3A0x862052392e3f478e!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIFThu6sgTGnDqm0sIEjDoCBO4buZaSAxMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1541788654309"
                                width="600" height="470" frameborder="2" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="row col-lg-6 contact_col_2">
                        <form class="contact_us_form row" id="contactForm" action="{!! url('contact')!!}" method="post"
                              novalidate="novalidate">
                            <input type="hidden" name="_token" value="!!csrf_token!!">
                            <div class="form-group col-lg-12">
                                <h4 class="m-text26 p-b-36 p-t-15">
                                    CONTACT ME
                                </h4>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" id="email" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" id="subject" name="subject"
                                       placeholder="Subject*">
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" id="subject" name="email" placeholder="Email">
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea class="form-control" name="message" id="message" rows="1"
                                          placeholder="Message" style="height: 200px;"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" value="submit" class="btn submit_btn form-control">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row col-lg-12" style="margin: 10px">

            </div>
            <!--================End Get in Touch Area =================-->
            <!--================End Contact Area =================-->
@endsection