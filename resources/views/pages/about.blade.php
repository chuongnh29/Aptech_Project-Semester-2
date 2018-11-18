@extends('master')
@section('title')
    Giới thiệu
@endsection
@section('content')
    <!--================Categories Banner Area =================-->

    <section class="link_page_LW_area">
        <div class="container">
            <div class="link_page_LW">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a>Giới thiệu</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="about_us">
        <div class="about_us_baner">
            <h1 style="font-size: 3.25rem; padding-top: 20px;">Luxury Watch</h1>
            <h3>better starts now</h3>
            <br>
            <p>
                Better Starts Now là niềm tin đơn giản<br>
                Luôn luôn có thể làm cho một điều gì đó tốt đẹp hơn,<br>
                Và bây giờ là lúc để bắt đầu thực hiện nó.
            </p>
        </div>
    </section>

    <!--================End Categories Banner Area =================-->
    <!-- content page -->
    <section>
        <div class="container">
            <div class="row">
                <div>
                    <img class="about_img_logo" src="public\source\assets\dest\img\icon.png" alt="">
                </div>
                <div class="about_us_01">
                    <h4>Luxury Watch nhà nhập khẩu đồng hồ chính hãng Thụy Sỹ</h4>
                    <p>Tên công ty: CÔNG TY CỔ PHẦN TRỰC TUYẾN LUXURY WATCH
                        <br>
                        Tên giao dịch tiếng Anh: LUXURY WATCH ONLINE .,JSC
                        <br>
                        Trụ sở chính: Số 8A, 8A Tôn Thất Thuyết, Mỹ Đình 2, Nam Từ Liêm, Hà
                        Nội.
                        <br>
                        Chi nhánh 1: Đà Nẵng
                        <br>
                        Chi nhánh 1: Hồ Chí Minh
                        <br>
                        Giấy CNĐKKD và MSDN số: 0104938104 đăng ký lần đầu do Sở Kế hoạch & Đầu tư thành phố Hà Nội cấp
                        ngày 07 tháng 10 năm 2010
                        <br>
                        Đại diện theo pháp luật của doanh nghiệp: Ông Đặng Vinh Quang – Giám đốc</p>
                </div>

            </div>
        </div>
    </section>

    <section class="bgwhite p-t-26 p-b-38">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-b-30">
                    <div class="hov-img-zoom">
                        <img src="public\source\assets\dest\img\banner\about_us_img0.jpg" alt="IMG-ABOUT">
                    </div>
                </div>
                {{--row about 1--}}
                <div class="col-md-8 p-b-30">
                    <h3 class="m-text26 p-t-10 p-b-10">
                        Our story
                    </h3>
                    <p class="p-b-5">
                        <strong>1. Quá trình hình thành và phát triển:</strong>
                    </p>
                    <p class="p-b-18">
                        Luxury Watch được thành lập vào năm 2008.
                        Ra đời trong thời điểm kinh doanh qua internet tại Việt Nam còn non trẻ, thị trường còn khó
                        khăn.
                        Trong quá trình phát triển, Luxury Watch mở rộng hoạt động kinh doanh đa dạng hơn là kênh
                        phân phối,
                        bán lẻ các thương hiệu đồng hồ danh tiếng. Khách hàng luôn luôn tin tưởng sử dụng sản phẩm và
                        dịch vụ được cung cấp
                        bởi Luxury Watch. Qua đó, Luxury Watch luôn duy trì được tốc độ tăng trưởng cao,
                        toàn diện về mọi mặt một cách bền vững so với các công ty kinh doanh cùng lĩnh vực.
                    </p>

                    <p class="p-b-18">
                        Công ty có đội ngũ nhân viên trẻ nhưng am hiểu sâu sắc về nghiệp vụ, chuyên môn cao, đủ khả năng
                        để có thể đáp ứng mọi yêu cầu dù khắt khe
                        nhất của khách hàng. Không những thế, đội ngũ nhân viên của Luxury Watch còn là những người
                        đầy lòng nhiệt tình và có thái độ niềm nở
                        trong cung cách phục vụ khách hàng.
                    </p>
                    <p class="p-b-18">
                        Luxury Watch cam kết duy trì mối quan hệ đối tác lâu dài, tận tụy với khách hàng. Sự thành
                        công của khách hàng cũng là sự thành công của chúng tôi.
                    </p>
                </div>
                {{--Row about 2--}}
                <div class="col-md-8 p-b-30">
                    <p class="p-b-10">
                        <strong>2. Mục tiêu với đối tác:</strong>
                    </p>
                    <p class="p-b-18">
                        Hiện nay, Luxury Watch đang phân phối các thương hiệu đồng hồ danh tiếng trên thế giới như:
                        Tourbillon Memorigin, Stuhrling Original, Diamond D, Bruno Sohnle Glashutte,
                        Atlantic Swiss, Aries Gold, Epos Swiss...
                    </p>

                    <p class="p-b-18">
                        Với mục tiêu hàng hóa phục vụ đa dạng, mẫu mã mới nhất, chất lượng tốt nhất, giá cả cạnh tranh
                        nhất, Luxury Watch hiểu được tầm quan trọng của việc xây dựng các mối quan hệ và đạt được sự
                        ủng hộ của những nhà cung cấp, những đối tác hàng đầu thế giới.
                    </p>
                    <p class="p-b-18">
                        Luxury Watch mong muốn tìm kiếm những đối tác tiềm năng có khả năng cũng cấp những mẫu đồng
                        hồ mới nhất để thiết lập mối quan hệ hợp tác trong tinh thần tất cả các bên cùng có lợi và cùng
                        phát triển.
                    </p>
                    <p class="p-b-18">

                    </p>
                </div>
                <div class="col-md-4 p-b-30">
                    <div class="hov-img-zoom">
                        <img src="public\source\assets\dest\img\banner\about_us_img1.jpg" alt="IMG-ABOUT">
                    </div>
                </div>
                {{--Row about 3--}}
                <div class="col-md-4 p-b-30">
                    <div class="hov-img-zoom">
                        <img src="public\source\assets\dest\img\banner\about_us_img3.jpg" alt="IMG-ABOUT">
                    </div>
                </div>
                <div class="col-md-8 p-b-30">
                    <p class="p-b-10">
                        <strong>3. Tầm nhìn:</strong>
                    </p>
                    <p class="p-b-18">
                        • Trở thành công ty có hệ thống showroom đồng hồ quy mô, chuyên nghiệp và thân thiện lớn nhất
                        Việt Nam.
                    </p>

                    <p class="p-b-18">
                        • Xây dựng Luxury Watch trở thành môi trường làm việc chuyên nghiệp, nơi mà mọi cá nhân có
                        thể phát huy tối đa sức sáng tạo, khả năng lãnh đạo và cơ hội làm chủ thực sự bản thân.
                    </p>
                    <p class="p-b-18">
                        • Xây dựng Luxury Watch trở thành một ngôi nhà chung thực sự cho tất cả CB-NV trong công ty
                        bằng việc cùng nhau chia sẻ quyền lợi, trách nhiệm và nghĩa vụ một cách công bằng và minh bạch
                        nhất.
                        Thành công của khách hàng là tương lai của công ty. Những yếu tố trên luôn gắn liền với truyền
                        thống, uy tín và thương hiệu của Công ty Cổ phần Trực tuyến Luxury trên thị trường Việt Nam
                        cũng như với quốc tế.
                    </p>
                    <p class="p-b-18">

                    </p>
                </div>
                {{--Row about 4--}}
                <div class="col-md-8 p-b-30">
                    <p class="p-b-10">
                        <strong>4. Giá trị cốt lõi:</strong>
                    </p>
                    <p class="p-b-18">
                        • Khách hàng là trọng tâm
                    </p>

                    <p class="p-b-18">
                        • Uy tín
                    </p>
                    <p class="p-b-18">
                        • Chất lượng
                    </p>
                    <p class="p-b-18">
                        • Trung thực
                    </p>
                    <p class="p-b-18">
                        • Hiệu quả
                    </p>
                    <p class="p-b-18">
                        • Phát triển con người
                    </p>
                </div>
                <div class="col-md-4 p-t-25">
                    <div class="hov-img-zoom">
                        <img src="public\source\assets\dest\img\banner\about_us_img2.jpg" alt="IMG-ABOUT">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <!-- Team -->

        <div class="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-lg-center text-left team_title">
                        <h1>Meet the team</h1>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pelle ntesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mattis effic iturut.  Vestibulum est mattis effic Nec odio vestibul. Etiam nec odio vestibulum est mattis effic iturut.  </p>
                    </div>
                </div>
                <div class="row">

                    <!-- Team Item -->
                    <div class="col-xl-3 col-lg-4 offset-xl-1 team_col">
                        <div class="team_container trans_200">
                            <div class="team_member_image"><img src="public\source\assets\dest\img\feature-add\f-add-3.jpgabout_us_01" alt=""></div>
                            <div class="team_member_content">
                                <div class="team_member_name">Maria Smith</div>
                                <div class="team_member_title">Manager</div>
                                <p>Ipsum dolor sit amet, conse ctetur adipiscing elit. Integ er sed dui eget lorem tinc idunt...</p>
                                <div class="team_member_link"><a href="#">read more</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Item -->
                    <div class="col-xl-3 col-lg-4 offset-xl-1 team_col">
                        <div class="team_container trans_200">
                            <div class="team_member_image"><img src="public\source\assets\dest\img\feature-add\f-add-3.jpg" alt=""></div>
                            <div class="team_member_content">
                                <div class="team_member_name">Jason Jones</div>
                                <div class="team_member_title">Developer</div>
                                <p>Ipsum dolor sit amet, conse ctetur adipiscing elit. Integ er sed dui eget lorem tinc idunt...</p>
                                <div class="team_member_link"><a href="#">read more</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Item -->
                    <div class="col-xl-3 col-lg-4 offset-xl-1 team_col">
                        <div class="team_container trans_200">
                            <div class="team_member_image"><img src="public\source\assets\dest\img\feature-add\f-add-3.jpg" alt=""></div>
                            <div class="team_member_content">
                                <div class="team_member_name">Jack Williams</div>
                                <div class="team_member_title">Designer</div>
                                <p>Ipsum dolor sit amet, conse ctetur adipiscing elit. Integ er sed dui eget lorem tinc idunt...</p>
                                <div class="team_member_link"><a href="#">read more</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--================End Contact Area =================-->
@endsection