<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')

    <meta charset="utf-8">
    <script src="https://bakerychu.ddns.net/bootstrap-input-spinner-master/src/input-spinner.js"></script>

    <title>靜宜大學登山社</title>
    <script>
         function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
</head>

<body class="bodyimg" style="height: 770px;">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
    @php
        $userid = Session::get('userid');
    @endphp
    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('PUmountain.layouts.navbar')
            @if (Session::has('message'))
                <div class="alert alert-success animate__animated animate__bounce alertsize" style="z-index: 5;" role="alert" id="success_alert">
                    <p class="alerttext userfontfamily3">{{ session('message') }}</p>
                </div>
            @endif

            <div class='PUprofile cartcontainer margintop'>
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
                                    借用人:{{ Session::get('username') }}

                                </p>
                                <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;">

                                    借用編號:{{ $order_id }}
                                </p>

                                <form method="POST" action="https://bakerychu.ddns.net/PUmountain/sendpic/{{ $order_id }}" id="update_orderpic"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="btn updatepic" style="background-color: #55c1d2;">
                                            <input id="orderpic" name="orderpic" style="display:none;" type="file" accept="image/*"
                                                onchange="loadFile(event)"/>
                                            <i class="fa fa-photo"></i> 上傳圖片
                                        </label>
                                        <div >
                                            <img id="output" style="    width: 40vh;" />
                                        </div>  
                                       
                                            <script>
                                                var loadFile = function(event) {
                                                    var output = document.getElementById('output');
                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                    output.onload = function() {
                                                        URL.revokeObjectURL(output.src) // free memory
                                                    }
                                                };

                                            </script>
                                    </div>
                            <input type="submit" value="開始借用" class="btn btn-primary addtext userfontfamily2" style="height: 80px;
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

    <script src="http://malsup.github.com/jquery.form.js"></script>


</body>

</html>
