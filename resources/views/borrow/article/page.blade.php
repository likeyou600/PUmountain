<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <meta charset="utf-8">
    <script src="/PUmountain/bootstrap-input-spinner-master/src/input-spinner.js"></script>
    <script>
        $(function() {
            $("input[type='number']").inputSpinner();
        });
    </script>
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="">

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')
        </header>
            <div class='container PUprofile mobilemargintop' >
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">

                                <div class="" style="display:inline-block;">
                                    <a href="/PUmountain/borrow/cart" style="display:block;position:relative;" onclick="do_click()">
                                        <img src="/PUmountain/picture/material/shopping-cart.png" style="width: 35px;">
                                        <div class="nav-counter">{{ Cart::session(Auth::user()->id)->getContent()->count() }}
                                        </div>
                                    </a>
                                </div>
                                <p class="userfontfamily2 tooltitle ">登山社器材借用系統</p>
                                <div class="" style="display:inline-block;">
                                    <a href="/PUmountain/borrow/cart" style="display:block;position:relative;" onclick="do_click()">
                                        <img src="/PUmountain/picture/material/shopping-cart.png" style="width: 35px;">
                                        <div class="nav-counter">{{ Cart::session(Auth::user()->id)->getContent()->count() }}
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
                                                    onclick="location.href='{{route('borrow.article',array('mat'))}}'">
                                                <input type="button" class="btn btn-secondary" value="睡袋"
                                                    onclick="location.href='{{route('borrow.article',array('bag'))}}'">

                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="大背包"
                                                    onclick="location.href='{{route('borrow.article',array('backpack'))}}'">
                                                <input type="button" class="btn btn-secondary" value="帳篷"
                                                    onclick="location.href='{{route('borrow.article',array('camp'))}}'">
                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="爐頭"
                                                    onclick="location.href='{{route('borrow.article',array('burner'))}}'">
                                                <input type="button" class="btn btn-secondary" value="其他"
                                                    onclick="location.href='{{route('borrow.article',array('other'))}}'">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12 itempadding" style="background-color:#f1f2f4">

                                        @yield('show')
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div style="height: 100px;">

            </div>
        


    </div>

    @if (Cart::session(Auth::user()->id)
        ->getContent()
        ->count())
        <div>
            <input type="button" class="seecart " value="前往借用~" onclick="do_click();location.href='{{route('borrow.cart')}}'" >
        </div>
    @endif
    
</body>

</html>
