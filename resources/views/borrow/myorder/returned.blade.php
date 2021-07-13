<div class="card PUcardtop">
    <div class="card-header opwhite" style="text-align: center;padding:
            8px;background-color:#66BAB7">
        <p class="userfontfamily2 tooltitle " style="color:white">借用編號:
            {{ $order_id }}</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
                                8px;background-color:red">
        <p class="userfontfamily2 tooltitle " style="color:white">
            借用情況:已歸還</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
                            8px;">
        <p class="userfontfamily2 filefont">
            借用時間: {{ $order_borrowdate }}
            最終歸還日: {{ $order_returndate }}
        </p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
    8px;background-color:#3378b8">
        <input class="btn btn-primary addtext userfontfamily2 btncolor" type="button" value="顯示詳細資訊及選項" onclick="toggle({{$order_id}})">
        <input class="btn btn-primary addtext userfontfamily2 btncolor" type="button" value="顯示上傳照片" onclick="togglepic({{$order_id}})">

    </div>
    <div id="show{{$order_id}}" class="hide">
        @include('borrow.myorder.order_datil_picshow')
    </div>
    <div class="card-body opwhite pichide" style=" padding: 0;" id="picshow{{$order_id}}">
            <img src="/PUmountain/uploads/order_in/{{$order_returnpic}}" class="showorderpic" >
    </div>
</div>

<div class="orderdivider"></div>