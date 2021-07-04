<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <meta charset="utf-8">

    <script type="text/javascript">
        function do_change() {
            if (document.getElementById('exampleCheck1').checked) {
                document.getElementById("agree").style.display = "block";

            } else {
                document.getElementById("agree").style.display = "none";
            }
        }

        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
    <div class="PUcontainer ">
        <header class="PUnavheader">
            @include('layouts.navbar')
            @include('layouts.alert')
            <div class='PUprofile cartcontainer margintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <p class="userfontfamily2 tooltitle ">靜宜大學登山社-器材借用規則</p>
                            </div>

                            <div class="card-body opwhite" style="padding: 0;">
                                <div class="container">
                                    <div class="row" style="background-color: #f1f2f4;">
                                        @foreach($rules as $rule)
                                        <p class="userfontfamily4">{{$rule->rule}}</p>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="card-header opwhite" style="text-align: center;padding:
                                    8px;">
                                <p class="userfontfamily4 " style="font-size: 30px;margin-bottom:0;">
                                    借用人:{{ Auth::user()->nickname }}
                                </p>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 20px;
                                        height: 40px;" onchange="do_change()">
                                    <label class="form-check-label userfontfamily4"
                                        style="font-size: 30px; margin-left:10px" for="exampleCheck1">我同意此借用規則</label>
                                </div>
                            </div>

                            <input type="button" value="前往確認資料" class="btn btn-primary addtext " id="agree" name="agree"
                                style="height: 80px;
                                font-size: 40px;display: none;"
                                onclick="do_click();location.href='{{route('borrow.checksend')}}'">


                        </div>

                    </div>
                </div>
            </div>
        </header>


    </div>


    <div class="white_mobile">

    </div>
</body>

</html>