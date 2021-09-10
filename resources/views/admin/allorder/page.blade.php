<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <script src="/PUmountain/js/slidetoggle.js"></script>
    <meta charset="utf-8">
    </head>

<body class="bodyimg" >

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')
        </header>
        <div class="backdiv">
            <input type="button" class="back" onclick="location.href='{{route('admin.page')}}'" value="回到管理選單">
        </div>
            <div class='container PUprofile mobilemargintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">


                                <p class="userfontfamily2 tooltitle ">社員借用管理</p>

                            </div>

                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="row" style="width: 100%;
                                margin-left: 0;">
                                    <div class="col-sm-3 col-12" style="background-color: #6c757d;">
                                        <div class="row">
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="所有借用"
                                                    onclick="location.href='{{route('admin.allorder',array('all'))}}'">
                                                <input type="button" class="btn btn-secondary" value="領取中"
                                                    onclick="location.href='{{route('admin.allorder',array('waitoget'))}}'">

                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">

                                                <input type="button" class="btn btn-secondary" value="借用中"
                                                    onclick="location.href='{{route('admin.allorder',array('using'))}}'">
                                                <input type="button" class="btn btn-secondary" value="已歸還"
                                                    onclick="location.href='{{route('admin.allorder',array('returned'))}}'">

                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">

                                                <input type="button" class="btn btn-secondary" value="已取消"
                                                    onclick="location.href='{{route('admin.allorder',array('cancle'))}}'">

                                            </div>



                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12" style="background-color:#f1f2f4">
                                        <div class="container">
                                            {{ $orders->links("pagination::bootstrap-4") }}
                                            <div class="row" style="background-color: #f1f2f4;">
                                                <div class="col text-center pointimagestyle phoneborrow">
                                                    @foreach ($orders as $order)
                                                    @php
                                                    $order_status = $order->status;
                                                    $order_username=App\models\User::find($order->user_id)->nickname;
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
                                                    @include('admin.allorder.waitoget')

                                                    @elseif ($order_status == 1)
                                                    @include('admin.allorder.using')

                                                    @elseif ($order_status == 0)
                                                    @include('admin.allorder.returned')

                                                    @elseif ($order_status == 99)
                                                    @include('admin.allorder.cancle')

                                                    @endif
                                                    @endforeach

                                                    @include('admin.allorder.adminsendpic_modal')
                                                    @include('admin.allorder.admincancle_modal')
                                                    @include('admin.allorder.adminreturnpic_modal')

                                                    <script>
                                                        function adminsendpic($id,$name){
                                                            $('#order_username').html("借用人: "+$name);
                                                            $('#show_order_id').html("借用編號: "+$id);
                                                            $('#order_id').val($id);
                                                        };
                                                        function admincancle($id){
                                                            $('#cancle_orderid').val($id);
                                                        };
                                                        function adminreturnpic($id,$name){
                                                            $('#return_order_username').html("借用人: "+$name);
                                                            $('#return_show_order_id').html("借用編號: "+$id);
                                                            $('#return_order_id').val($id);
                                                        };

                                                        

                                                    </script>
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
   


    </div>


    <div style="height: 270px;">

    </div>


</body>

</html>