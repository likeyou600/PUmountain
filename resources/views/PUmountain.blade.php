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
                slideshowSpeed: 5000,
                animationSpeed: 1000,
                'directionNav': false,
                'controlNav': false

            });
        });
    </script>


    <style>
        @media only screen and (min-width:576px) {
            .PUtitle {
                display: none;
            }
        }
    </style>
</head>

<body class="bodyimg" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
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

        <div class="contact">
            <p class="contact_text">聯絡我們</p>
            <input type="button" class="PUcontact_icon" style="background-image: url(picture/material/facebook.png);"
                onclick="location.href='https://www.facebook.com/PUCC10325'">
            <input type="button" class="PUcontact_icon" style="background-image: url(picture/material/line.png);"
                onclick="location.href='https://line.me/ti/p/X0XBiAnjFw'">
        </div>

        <div class="icon">
            <div class="maintenance">
                <input type="button" class="PUpoint" style="background-image: url(picture/material/equitment.png);"
                    onclick="do_click();location.href='{{route('borrow.article',array('mat'))}}'">
                <p class="PUtext">器材借用</p>
            </div>
            <div class="us">
                <input type="button" class="PUpoint" style="background-image: url(picture/material/aboutus.png);"
                    onclick="do_click();location.href='{{route('PUpicture')}}'">
                <p class="PUtext">關於我們</p>
            </div>
            <div class="camera">
                <input type="button" class="PUpoint" style="background-image: url(picture/material/camera.png);"
                    onclick="do_click();location.href='{{route('PUpicture')}}'">
                <p class="PUtext">活動照片</p>
            </div>
        </div>

        <div class="news">
            <p class="newstext contact_text">最新消息</p>
            @php
            $bulletins=App\Models\Bulletin::all()->sortByDesc('id');
            @endphp
            <table class="table table-striped">
                <tr class="datetext" style="color: #000000bf!important;
                ">
                    <th>
                        POSTDATE
                    </th>
                    <th>
                        TITLE
                    </th>
                </tr>
                @foreach ($bulletins as $bulletin)
                @php
                 $dt=new DateTime($bulletin->created_at);
                 $dt=$dt->modify("-1911 year");   
                 $dt=ltrim($dt->format("Y.m.d"),"0")
                @endphp
                <tr>
                    <td class="datetext">
                       {{$dt}}
                    </td>
                    <td class="contact_text">
                        <a href="{{route('bulletin.detail',[$bulletin->id])}}" style="color: #000000;    font-family: 'Noto Sans TC', sans-serif;">{{$bulletin->title}}</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>


    {{-- <img src="picture/material/chatbox.png" class="PUchat"> --}}
    {{-- <img src="picture/material/cloud.png" class="PUcloud"> --}}
    {{-- <img src="picture/material/down.png" class="PUpeople"> --}}
    <img src="picture/material/PUM_W.png" class="PUbigtitle">

</body>

</html>