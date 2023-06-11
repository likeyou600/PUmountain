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
</head>

<body class="bodyimg" style="">

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')
        </header>
        <div class="backdiv">
            <input type="button" class="back" onclick="location.href='{{ route('admin.page') }}'" value="回到管理選單">
        </div>
        <div class='container PUprofile mobilemargintop'>
            <div class="row justify-content-center align-items-center">
                <div class="col align-self-center">

                    <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                        <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                            <p class="userfontfamily2 tooltitle ">更改社員 {{$order->user->nickname}} <br>借用編號: {{$order->id}} 所借的項目</p>
                        </div>

                        <div class="card-body opwhite" style="    padding: 0;">
                            <div class="row" style="width: 100%;
                                margin-left: 0;">

                                <div class=" itempadding" style="background-color:#f1f2f4">
                                    <div class="row">
                                        @foreach ($items as $item)
                                            @foreach ($order->order_details as $order_detail)
                                                @php
                                                    $quantity = 0;
                                                    if ($item->id == $order_detail->item_id) {
                                                        $quantity = $order_detail->quantity;
                                                        
                                                    }
                                                @endphp
                                            @endforeach

                                            <div class="col-sm-2 col-6 text-center pointimagestyle phoneborrow">
                                                <div class="card PUcardtop">
                                                    <img src="/PUmountain/picture/borrow/{{ $item->category->category }}/{{ $item->picture }}" class="card-img-top">
                                                    <div class="PUcardbody">
                                                        <form action="{{ route('admin.change_quantity') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <p class="userfontfamily2 filefont">數量:</p>
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="userfontfamily2 filefont inputsni" value='{{ $quantity }}' min="0" max="" step="1"
                                                                    name="new_quantity" />
                                                            </div>
                                                            <input type="submit" value="更改數量" class="btn btn-primary addtext" onclick="do_click()">

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @include('admin.equipment.deleteitem_modal')
                                        <script>
                                            function itemdelete($id) {
                                                $('#deleteid').val($id);
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


    <div style="height: 100px;">

    </div>
</body>

</html>
