<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>FoodPark || Restaurant Template</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.exzoom.css') }}">

    {{-- embed font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>

    @include('frontend.layouts.menu')
    <!--=============================
    Header START
==============================-->
    <section class="hero">
        <div class="hero_images">
        </div>
    </section>

    <section class="hero_content">
        <div class="container">
            <div class="hero__inner">
                <h1 class="hero__heading"><strong>LỜI NÓI ĐẦU</strong></h1>
                <p class="hero__text">Được Thành lập và khởi đầu hoạt động từ năm 2000, Nhà Hàng Phố Biển toạ lạc trên
                    bãi
                    biển được hình thành
                    đầu tiên trên Thành Phố Đà nẵng , bãi biển Thanh Bình là một trong những bãi biển bao bọc tất cả kỷ
                    niệm
                    thân thương của tất cả người Đà Nẵng .</p>
                <p class="hero__text">Phố Biển là điểm thân quan quen thuộc của thực khách địa phương cũng như các du
                    khách
                    gần xa trong &
                    ngoài nước.</p>
                <p class="hero__text">Phố Biển với mong muốn mang những con hải sản ngon nhất từ biển cả đại dương, nhà
                    hàng
                    đã không ngừng học
                    hỏi và tìm tòi những loại hải sản từ nhiều nước trên thế giới như King Crab, Tu Hài Canada, Tôm Hùm
                    Alaska , Sò Điệp Nhật , Bào Ngư Hàn Quốc , Cá Bơn Hàn Quốc, Ốc Hoàng Hậu Tsubugai Nhật Bản…Ngoài ra
                    Phố
                    Biển luôn nổi tiếng với các món lẫu buffet và nướng.</p>
                <p class="hero__text">Phố Biển luôn phục vụ thực khách với nhiều phong cách mới lạ và luôn chế biến ẩm
                    thực
                    có nhiều đặc trưng
                    để mang lại ấn tượng sâu sắc trong lòng du khách trong và ngoài nước.</p>
                <p class="hero__text">Sau nhiều năm đi vào hoạt động và phát triển, Nhà hàng Phố Biển luôn hướng tới mục
                    tiêu đáp ứng về ẩm
                    thực phong phú và tạo ra nhiều món ăn ngon, hợp khẩu vị của thực khách trong và ngoài nước với yêu
                    cầu
                    ngày càng cao về hình thức, chất lượng. Nhà hàng luôn quan tâm, chú trọng đến chất lượng trong từng
                    món
                    ăn. Các loại hải sản cao cấp sẽ được Phố Biển chế biến thành các món ăn đa dạng, phong phú và hợp
                    với
                    sức khỏe của quý khách. Đặc biệt, đội ngũ nhân viên được đào tạo chuyên nghiệp, luôn nhiệt tình
                    trong
                    công việc, nhà hàng đảm bảo sẽ đưa đến cho thực khách những bữa ăn ngon, đầm ấm mang phong cách Âu Á
                    .
                </p>
                <p class="hero__text">Không gian Nhà Hàng hiện đại,kiến trúc mang vẻ cổ kính sang trọng , đội ngũ nhân
                    viên
                    phục vụ chuyên
                    nghiệp,với những món ăn Âu Á hải sản tươi ngon – Nhà hàng Phố Biển sẽ mang đến cho Quý khách những
                    phút
                    giây thoải mái bên người thân, bạn bè khi quý khách đến Đà Nẵng</p>
                <p class="hero__text"><strong>Phố Biển – Nguyễn Tất Thành</strong> sở hữu không gian 2
                    tầng
                    với sức chứa 700
                    khách, Địa điểm
                    thuận lợi nằm ngay
                    trung tâm thành phố, nhà
                    hàng ở một vị trí vừa gần thành phố vừa sát mặt biển và nằm trên cung đường đẹp nhất Đà Nẵng. Sở hữu
                    không gian ba mặt tiền rộng rãi thoáng mát và kiến trúc cổ kính tuyệt đẹp, nhà hàng có&nbsp; một
                    không
                    gian vô cùng rộng rãi, trẻ trung, hiện đại rất thích hợp cho những bữa tiệc tiếp khách, tiệc gia
                    đình
                    hứa hẹn đây sẽ là nơi khiến bạn thích thú khi thưởng thức bữa ăn cùng gia đình và bạn bè gần xa.</p>
                <p class="hero__text"><strong>Phố Biển – Khu Đảo Xanh</strong> sở hữu không gian 2 tầng với sức chứa 450
                    khách, nằm một trong
                    khu biệt thự đẳng
                    cấp tại Đà Nẵng, nơi có chuỗi nhà hàng sang trọng, căn hộ hiện đại với khuôn viên thoáng mát. Đến
                    đây,
                    thực khách không chỉ được chiêm ngưỡng phong cách kiến trúc tuyệt đẹp và đẳng cấp mà còn có thể ngắm
                    nhìn nhịp sống của thành phố, đặc biệt lung linh và sống động về đêm nhờ view nhìn ra cầu Trần Thị
                    Lý.
                    Bước vào bên trong, nhà hàng sở hữu một không gian vô cùng rộng rãi, trẻ trung, hiện đại rất thích
                    hợp
                    cho những bữa tiệc tiếp khách, tiệc gia đình,… với những gam màu tươi sáng đan cài hài hòa dưới ánh
                    đèn
                    ấm áp.</p>
                <div class="hero__content-images">
                    <div class="heoro_images">
                        <img src="{{ asset('images/about/gallary-01.jpg') }}" alt="" class="hero_images-img">
                    </div>
                    <div class="heoro_images">
                        <img src="{{ asset('images/about/gallary-02.jpg') }}" alt="" class="hero_images-img">
                    </div>
                    <div class="heoro_images">
                        <img src="{{ asset('images/about/gallary-03.jpg') }}" alt="" class="hero_images-img">
                    </div>
                </div>

                <p class="hero__text hero__subtext">Cùng được đầu tư trang thiết bị hiện đại và sang trọng, hai cơ sở
                    của hệ
                    thống Phố
                    Biển đều sở hữu một
                    không gian rộng rãi, phù hợp với nhiều loại hình đặt tiệc của thực khách.</p>
                <h3 class="hero__heading lv3 ">Thông tin liên hệ</h3>
                <ul>
                    <li class="hero__text hero__item"><strong>Phố Biển Nguyễn Tất Thành:</strong> Số 229 – 231 Nguyễn
                        Tất Thành,
                        Phường Thanh Bình,
                        Quận Thanh Khê,
                        TP.
                        Đà
                        Nẵng</li>
                    <li class="hero__text hero__item"><strong>Phố Biển Đảo Xanh:</strong> Lô 01A-3-5 Khu Đảo Xanh,
                        Phường Hòa Cường
                        Bắc, Quận Hải
                        Châu, TP. Đà Nẵng
                    </li>
                    <li class="hero__text hero__item">Điện thoại: 02363 530 955 – 02363 530 863</li>
                    <li class="hero__text hero__item">Email: info@phobiendanang.com – rongvang121964@gmail.com</li>
                    <li class="hero__text hero__item">Website: https://phobiendanang.com/</li>
                </ul>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')

    <!--=============================
    Header END
==============================-->
</body>

</html>
