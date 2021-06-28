<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <meta charset="utf-8">
    <script src="https://bakerychu.ddns.net/PUmountain/bootstrap-input-spinner-master/src/input-spinner.js"></script>
    <script>
        $(function() {
            $("input[type='number']").inputSpinner();
        });
        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="">
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
            @if (Session::has('selectmessage'))
                <div class="alert alert-success animate__animated animate__bounce alertsize" style="z-index: 5;" role="alert" id="success_alert">
                    <p class="alerttext userfontfamily3">{{ session('selectmessage') }}</p>
                </div>
            @endif
            <script type="text/javascript">
                window.setTimeout(function() {
                    $('#success_alert').alert('close');
                }, 2000);

            </script>

            <div class='PUprofile'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">

                                <div class="" style="display:inline-block;">
                                    <a href="https://bakerychu.ddns.net/PUmountain/borrow/cart" style="display:block;position:relative;" onclick="do_click()">
                                        <img src="https://bakerychu.ddns.net/PUmountain/picture/PUmountain/shopping-cart.png" style="width: 35px;">
                                        <div class="nav-counter">{{ Cart::session($userid)->getContent()->count() }}
                                        </div>
                                    </a>
                                </div>
                                <p class="userfontfamily2 tooltitle ">登山社器材借用系統</p>
                                <div class="" style="display:inline-block;">
                                    <a href="https://bakerychu.ddns.net/PUmountain/borrow/cart" style="display:block;position:relative;" onclick="do_click()">
                                        <img src="https://bakerychu.ddns.net/PUmountain/picture/PUmountain/shopping-cart.png" style="width: 35px;">
                                        <div class="nav-counter">{{ Cart::session($userid)->getContent()->count() }}
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="row" style="width: 100%;
                                margin-left: 0;">
                                    <div class="col-sm-3 col-12" style="background-color: #6c757d;">
                                        <div class="row">
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="睡墊"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/mat'">
                                                <input type="button" class="btn btn-secondary" value="睡袋"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/bag'">

                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="大背包"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/backpack'">
                                                <input type="button" class="btn btn-secondary" value="帳篷"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/camp'">
                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="爐頭"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/burner'">
                                                <input type="button" class="btn btn-secondary" value="其他"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/other'">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12" style="background-color:#f1f2f4">

                                        @yield('mat')
                                        @yield('bag')
                                        @yield('backpack')
                                        @yield('burner')
                                        @yield('camp')
                                        @yield('other')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>


    </div>

    @if (Cart::session($userid)
        ->getContent()
        ->count())
        <div>
            <input type="button" class="seecart " value="前往借用~" onclick="do_click();location.href='https://bakerychu.ddns.net/PUmountain/borrow/cart'" >
        </div>
    @endif
    <div style="height: 100px;">

    </div>
</body>

</html>
