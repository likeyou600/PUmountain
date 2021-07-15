<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <meta charset="utf-8">
    <script src="/PUmountain/bootstrap-input-spinner-master/src/input-spinner.js"></script>
    <script>
        $(function() {
            $("input[type='number']").inputSpinner();
        })
    </script>
    </head>

<body class="bodyimg" >

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')
        </header>
            <div class='container PUprofile cartcontainer mobilemargintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <p class="userfontfamily2 tooltitle ">器材借用系統-借用確認</p>
                            </div>

                            <input type="button" value="按下開始借用" class="btn btn-primary addtext" name="update_button"
                                style="height: 80px;
                                            font-size: 40px;"
                                onclick="do_click();location.href='{{route('borrow.cartstore')}}'">

                            <div class="card-header opwhite" style="text-align: center;padding:
                                    8px;">
                                <p class="userfontfamily4 " style="font-size: 30px;margin-bottom:0;">
                                    借用人:{{Auth::user()->nickname}}
                                </p>
                            </div>


                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="container">
                                    <div class="row" style="background-color: #f1f2f4;">
                                        @foreach ($carts as $cart)

                                        @php
                                        $pic = $cart->name;
                                        $category = $cart->attributes->category;
                                        $quantity = $cart->quantity;
                                        @endphp

                                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                            <div class="card PUcardtop" style="margin-bottom: 10px;">
                                                <img src="../picture/borrow/{{ $category }}/{{ $pic }}.jpg"
                                                    class="card-img-top">
                                                <div class="PUcardbody">
                                                    <p class="userfontfamily2 filefont">選擇數量為: {{ $quantity }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div style="height: 100px;">

                </div>
            </div>



    </div>


    <div class="white_mobile">

    </div>
</body>

</html>