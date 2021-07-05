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
    @include('borrow.myorder.order_datil_picshow')
</div>

<div class="orderdivider"></div>