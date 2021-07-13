<div class="card PUcardtop">
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#66BAB7">
        <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$order_username}}<br>借用編號: {{ $order_id }}</p>

    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#0069d9">
        <p class="userfontfamily2 tooltitle " style="color:white">
            借用情況:借用中</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;">
        <p class="userfontfamily2 filefont">
            借用時間: {{ $order_borrowdate }}
            最慢歸還日: {{ $order_lastreturndate }}

            剩餘天數: {{ $day }}天
        </p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#3378b8">
        <input class="btn btn-primary addtext userfontfamily2 btncolor" type="button" value="顯示詳細資訊及選項" onclick="toggle({{$order_id}})">
        <input class="btn btn-primary addtext userfontfamily2 btncolor" type="button" value="顯示上傳照片" onclick="togglepic({{$order_id}})">
    </div>
    <div id="show{{$order_id}}" class="hide">
        @include('admin.allorder.order_datil_picshow')
        <input type="button" value="管理代歸還" class="btn btn-primary addtext userfontfamily2"
             data-bs-toggle="modal" data-bs-target="#adminreturnpicmodal"
            onclick="adminreturnpic({{$order_id}},'{{$order_username}}');">
        <input type="button" value="取消此筆借用" class="btn btn-primary addtext userfontfamily2" onclick="admincancle({{$order_id}});"
            data-bs-toggle="modal" data-bs-target="#admincanclemodal" style="background-color: red">
    </div>
    <div class="card-body opwhite pichide" style=" padding: 0;" id="picshow{{$order_id}}">
        <div class="container">
            <img src="/PUmountain/uploads/order_out/{{$order_pic}}" class="showorderpic">
        </div>
    </div>
</div>

<div class="orderdivider"></div>