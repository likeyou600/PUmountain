<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <meta charset="utf-8">
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;">
    <div class="PUcontainer ">
        <header class="PUnavheader">
            @include('layouts.navbar')
            @include('layouts.alert')
            <div class='PUprofile cartcontainer margintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">
                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <p class="userfontfamily2 tooltitle ">借用情況</p>
                            </div>

                            @if ($User->borrowtime == 0)
                            <div class="col" style="text-align: center;margin-top: 1%;">
                                <p class="userfontfamily2 tooltitle ">尚無借用資料</p>
                            </div>
                            <input type="button" value="前往借用" class="btn btn-primary addtext" name="update_button"
                                style="height: 100px;
                                    font-size: 50px;" onclick="location.href='{{ route('borrow.article', ['mat']) }}'">

                            @else

                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="container">
                                    <div class="row" style="background-color: #f1f2f4;">
                                        <div class="col text-center pointimagestyle phoneborrow">

                                            @foreach ($orders as $order)
                                            @php
                                            $order_status = $order->status;
                                            $order_id = $order->id;
                                            $order_borrowdate = $order->borrow_date;
                                            $order_lastreturndate =$order->last_return_date;
                                            $order_returndate=$order->return_date;
                                            $today = date('Y-m-d');
                                            $day = (strtotime($order_lastreturndate) - strtotime($today)) / (60 *
                                            60 * 24);
                                            $order_details=$order->order_details;//詳細訂單資訊
                                            @endphp
                                            @if ($order_status == 2)
                                            @include('borrow.myorder.retrieve')

                                            @elseif ($order_status == 1)
                                            @include('borrow.myorder.using')

                                            @elseif ($order_status == 0)
                                            @include('borrow.myorder.returnback')

                                            @elseif ($order_status == 99)
                                            @include('borrow.myorder.cancle')

                                            @endif
                                            @endforeach
                                        </div>
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