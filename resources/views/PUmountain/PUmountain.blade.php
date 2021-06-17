<!DOCTYPE html>
<html lang="zh-TW">

<head>
    {{-- 圖片css --}}
    <link rel="stylesheet" href="{{ asset('slider/flexslider.css') }}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    {{-- 圖片css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    {{-- 動畫css --}}
    <meta name="google-site-verification" content="Hl3TgEqr18nG3xghut6awJmWs6IJIKg-r1U1735PcVQ" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300&family=Yusei+Magic&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/PUmountain/PU.css') }}">
    <link rel="stylesheet" href="{{ asset('css/PUmountain/PU_mobile.css') }}">
    <link rel="icon" href="{{ asset('pu.ico') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <title>靜宜大學登山社</title>
    <meta name="description" content="我們因山而快樂，我們因山而勇敢，我們因山而感動，我們因山而認識。在山上我們擺脫平日的束縛過著自然的生活，呼吸新鮮的空氣，喝著山中的泉水，體驗大地的溫暖，看見壯麗的美景交融，歡迎各位愛冒險與喜歡體驗山林的你們來參加，一起加入我們吧!"/>
    <script>
        function do_click() {
           document.getElementById("loading").style.display = "block";
           document.getElementById("loadingup").style.display = "block";
       }
   </script>
</head>

<body class="bodyimg" style="height:100vh; position: fixed">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('PUmountain.layouts.navbar')
            <p class="marquee"><span class="marqueefontsize">~歡迎加入靜宜大學登山社~社費:NTD400~終生制~加入後即可借裝備!~</span></p>


            @if (Session::has('logout_check'))
                <div class="alert alert-success animate__animated animate__bounce alertsize" role="alert"
                    id="homealert" style="z-index: 11">
                    <p class="alerttext userfontfamily3">已登出</p>
                </div>
            @endif
            <script type="text/javascript">
                window.setTimeout(function() {
                    $('#homealert').alert('close');
                }, 4000);

            </script>
        </header>
        <div class="container" style="    margin-top: 10px;">
            <div class="flexslider PUpicsli borderradis">
                <ul class="slides">
                    <li><img src="picture/PUmountain/slide/1.jpg" class="borderradis"></li>
                    <li><img src="picture/PUmountain/slide/2.jpg" class="borderradis"></li>
                    <li><img src="picture/PUmountain/slide/3.jpg" class="borderradis"></li>
                    <li><img src="picture/PUmountain/slide/4.jpg" class="borderradis"></li>
                    <li><img src="picture/PUmountain/slide/5.jpg" class="borderradis"></li>
                    <li><img src="picture/PUmountain/slide/6.jpg" class="borderradis"></li>
                </ul>

            </div>
            <div class="maintenance">
                <input type="button" class="PUpoint" style="background-image: url(picture/PUmountain/maintenance.png);"
                    onclick="do_click();location.href='https://bakerychu.ddns.net/PUmountain/borrow/mat'">
                <p class="PUtext">器材借用</p>
            </div>
            <div class="camera">
                <input type="button" class="PUpoint" style="background-image: url(picture/PUmountain/camera.png);"
                    onclick="do_click();location.href='https://bakerychu.ddns.net/PUmountain/PUpicture'">
                <p class="PUtext">活動照片</p>
            </div>

            <div>
                <div class="contact">
                    <p class="contact_text">聯絡我們</p>
                    <input type="button" class="PUcontact_icon"
                        style="background-image: url(picture/PUmountain/facebook.png);"
                        onclick="location.href='https://www.facebook.com/PUCC10325'">
                    <input type="button" class="PUcontact_icon"
                        style="background-image: url(picture/PUmountain/line.png);"
                        onclick="location.href='https://line.me/ti/p/X0XBiAnjFw'">
                </div>
            </div>
        </div>
    </div>
    <img src="picture/PUmountain/chatbox.png" class="PUchat">
    <img src="picture/PUmountain/cloud.png" class="PUcloud">
    <img src="picture/PUmountain/down.png" class="PUpeople">







</body>

</html>
