<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    {{-- 圖片css --}}
    <link rel="stylesheet" href="{{ asset('slider/flexslider.css') }}" type="text/css">
    <script src="slider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.flexslider').flexslider({
                slideshowSpeed: 3000,
                animationSpeed: 1000,
                'directionNav': false,
                'controlNav': false

            });
        });
    </script>

    <title>靜宜大學登山社</title>
    <meta name="description"
        content="我們因山而快樂，我們因山而勇敢，我們因山而感動，我們因山而認識。在山上我們擺脫平日的束縛過著自然的生活，呼吸新鮮的空氣，喝著山中的泉水，體驗大地的溫暖，看見壯麗的美景交融，歡迎各位愛冒險與喜歡體驗山林的你們來參加，一起加入我們吧!" />
    <style>
        @media only screen and (min-width:576px) {
            .PUtitle {
                display: none;
            }
        }
    </style>
</head>

<body class="bodyimg" style="height:100%;" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
    <header class="PUnavheader">
        @include('layouts.navbar')
        @include('layouts.alert')
    </header>
    <p class="marquee"><span class="marqueefontsize">{{App\Models\Prompter::find(1)->content}}</span></p>
    <div class="container" style="    margin-top: 10px;">
        <div class="flexslider PUpicsli borderradis">
            <ul class="slides">
                <li><img src="picture/slide/1.jpg" class="borderradis"></li>
                <li><img src="picture/slide/2.jpg" class="borderradis"></li>
                <li><img src="picture/slide/3.jpg" class="borderradis"></li>
                <li><img src="picture/slide/4.jpg" class="borderradis"></li>
                <li><img src="picture/slide/5.jpg" class="borderradis"></li>
                <li><img src="picture/slide/6.jpg" class="borderradis"></li>
            </ul>

        </div>
        <div class="maintenance">
            <input type="button" class="PUpoint" style="background-image: url(picture/material/maintenance.png);"
                onclick="do_click();location.href='{{route('borrow.article',array('mat'))}}'">
            <p class="PUtext">器材借用</p>
        </div>
        <div class="camera">
            <input type="button" class="PUpoint" style="background-image: url(picture/material/camera.png);"
                onclick="do_click();location.href='{{route('PUpicture')}}'">
            <p class="PUtext">活動照片</p>
        </div>

        <div>
            <div class="contact">
                <p class="contact_text">聯絡我們</p>
                <input type="button" class="PUcontact_icon"
                    style="background-image: url(picture/material/facebook.png);"
                    onclick="location.href='https://www.facebook.com/PUCC10325'">
                <input type="button" class="PUcontact_icon" style="background-image: url(picture/material/line.png);"
                    onclick="location.href='https://line.me/ti/p/X0XBiAnjFw'">
            </div>
        </div>
    </div>

    {{-- <img src="picture/material/chatbox.png" class="PUchat"> --}}
    {{-- <img src="picture/material/cloud.png" class="PUcloud"> --}}
    {{-- <img src="picture/material/down.png" class="PUpeople"> --}}
    <img src="picture/material/PUM_W.png" class="PUbigtitle">








</body>

</html>