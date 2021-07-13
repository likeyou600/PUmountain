<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')

    <meta charset="utf-8">
    <title>靜宜大學登山社</title>
    <script>
        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
</head>

<body class="bodyimg" >
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')

            <div class='PUprofile cartcontainer mobilemargintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <p class="userfontfamily2 tooltitle ">器材照片上傳</p>
                            </div>

                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="container">
                                    <div class="row" style="background-color: #f1f2f4;">

                                    </div>

                                </div>
                            </div>
                            <div class="card-header opwhite" style="text-align: center;padding:
                                    8px;">
                                <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;">
                                    借用人: {{ Auth::user()->nickname }}

                                </p>
                                <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;">

                                    借用編號: {{ $order_id }}
                                </p>

                                <form method="POST"
                                    action="{{route('borrow.sendpic')}}"
                                    id="update_orderpic" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order_id }}">
                                    <div class="form-group">
                                        <label class="btn updatepic" style="background-color: #55c1d2;">
                                            <input id="pic" name="pic" style="display:none;" type="file"
                                                accept="image/* , .heic" />
                                            <i class="fa fa-photo"></i> 上傳圖片
                                        </label>

                                            <img id="output" style="    width: 40vh; 
                                            margin-bottom: 20px;
                                        " />
                                            <script src="/PUmountain/js/picture.js"></script>
                                    </div>
                                    <input type="submit" value="開始借用" class="btn btn-primary addtext userfontfamily2"
                                        style="height: 80px;
                                font-size: 40px;width: 100%;" onclick="do_click()">

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
        </header>


    </div>


    <div class="white_mobile">

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>


</body>

</html>