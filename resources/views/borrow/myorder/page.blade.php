<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <script src="/PUmountain/js/slidetoggle.js"></script>
    <meta charset="utf-8">
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg">

    <div class="PUcontainer ">
        <div class="loadingup" id="loadingup"></div>
        <div id="loading" style="display:none">
            <img src="{{ asset('loading.gif') }}" class="img-responsive">
        </div>
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')
        </header>
            <div class='container PUprofile mobilemargintop' >
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">


                                <p class="userfontfamily2 tooltitle ">我的借用情況</p>
                                
                            </div>
                            

                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="row" style="width: 100%;
                                margin-left: 0;">
                                    <div class="col-sm-3 col-12" style="background-color: #6c757d;">
                                        <div class="row">
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="所有借用"
                                                    onclick="location.href='{{route('borrow.myorder',array('all'))}}'">
                                                <input type="button" class="btn btn-secondary" value="領取中"
                                                    onclick="location.href='{{route('borrow.myorder',array('waitoget'))}}'">

                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">

                                                <input type="button" class="btn btn-secondary" value="借用中"
                                                    onclick="location.href='{{route('borrow.myorder',array('using'))}}'">
                                                <input type="button" class="btn btn-secondary" value="已歸還"
                                                    onclick="location.href='{{route('borrow.myorder',array('returned'))}}'">

                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">

                                                <input type="button" class="btn btn-secondary" value="已取消"
                                                    onclick="location.href='{{route('borrow.myorder',array('cancle'))}}'">

                                            </div>



                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12" style="background-color:#f1f2f4">
                                 
                                            {{ $orders->links("pagination::bootstrap-4") }}
                                            <div class="row" style="background-color: #f1f2f4;">
                                                <div class="col text-center pointimagestyle phoneborrow">
                                                    @foreach ($orders as $order)
                                                    @php
                                                    $order_status = $order->status;
                                                    $order_id = $order->id;
                                                    $order_borrowdate = $order->borrow_date;
                                                    $order_lastreturndate =$order->last_return_date;
                                                    $order_returndate=$order->return_date;
                                                    $order_pic=$order->pic_borrow;
                                                    $order_returnpic=$order->pic_return;
                                                    $today = date('Y-m-d');
                                                    $day = (strtotime($order_lastreturndate) - strtotime($today)) / (60
                                                    *
                                                    60 * 24);
                                                    $order_details=$order->order_details;//詳細訂單資訊
                                                    @endphp
                                                    @if ($order_status == 2)
                                                    @include('borrow.myorder.waitoget')

                                                    @elseif ($order_status == 1)
                                                    @include('borrow.myorder.using')

                                                    @elseif ($order_status == 0)
                                                    @include('borrow.myorder.returned')

                                                    @elseif ($order_status == 99)
                                                    @include('borrow.myorder.cancle')

                                                    @endif
                                                    @endforeach

                                                </div>

                                            </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



    </div>


    <div style="height: 100px;">

    </div>


</body>

</html>