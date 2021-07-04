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
                                <p class="userfontfamily2 tooltitle ">器材借用系統-借物車</p>
                            </div>
                            @if ($carts->isEmpty())
                            <div class="col" style="text-align: center;margin-top: 1%;">
                                <p class="userfontfamily2 tooltitle ">借物車尚無物品</p>
                            </div>
                            <input type="button" value="前往借用" class="btn btn-primary addtext" name="update_button"
                                style="height: 100px;
                                    font-size: 50px;"
                                onclick="location.href='{{route('borrow.article',array('mat'))}}'">

                            @else
                            <input type="button" value="前往確認借用規則" class="btn btn-primary addtext" name="update_button"
                                style="height: 80px;
                                            font-size: 40px;"
                                onclick="do_click();location.href='{{route('borrow.rule')}}'">

                            <input type="button" value="刪除借物車" name="delete_button" class="btn btn-primary addtext"
                                style="background-color:#f03535; margin-top: 30px;height: 45px;
                                    font-size: 21px;"
                                onclick="do_click();location.href='{{route('borrow.removecart')}}'">


                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="container">
                                    <div class="row" style="background-color: #f1f2f4;">
                                        @foreach ($carts as $cart)

                                        @php
                                        $id=$cart->id;
                                        $quantity=$cart->quantity;
                                        $pic=$cart->name;
                                        $max=App\Models\Item::find($cart->id)->quantity;
                                        $category = $cart->attributes->category;
                                        @endphp

                                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                            <div class="card PUcardtop">
                                                <img src="../picture/borrow/{{ $category }}/{{ $pic }}.jpg"
                                                    class="card-img-top">
                                                <form action="{{route('borrow.updatecart')}}" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                    <input type="hidden" name="category" value="{{ $category }}">
                                                    <div class="PUcardbody">

                                                        <p class="userfontfamily2 filefont">庫存: {{$max}}
                                                            選擇數量:</p>
                                                        <div class="input-group mb-3">


                                                            <input type="number" value={{ $quantity }} min="1"
                                                                max={{ $max }} step="1" name="select"
                                                                class="userfontfamily2 filefont" />


                                                        </div>
                                                        <div class="row" style="display: inline-block;">
                                                            <input type="submit" value="刪除" name="delete_button"
                                                                class="btn btn-primary addtext"
                                                                style="background-color:#f03535" onclick="do_click()">
                                                            <input type="submit" value="更新物品數量"
                                                                class="btn btn-primary addtext" name="update_button"
                                                                onclick="do_click()">

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            @endif
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