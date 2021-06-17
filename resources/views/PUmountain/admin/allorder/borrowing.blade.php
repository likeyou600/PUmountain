@extends('PUmountain.admin.PUallorder')

@section('borrowing')
    <div class="container">
        <div class="row" style="background-color: #f1f2f4;">
            <div class="col text-center pointimagestyle phoneborrow">
                {{-- $user_data
            $user_countdata --}}
                @php
                    $quantity = count($user_countdata); //個人大筆訂單數
                    $now_count = 0;
                @endphp


                @for ($time = 0; $time < $quantity; $time++)

                    @php
                        $countdata = $user_countdata[$time]->user_borrowtime; //大筆裡有多少小筆的
                        
                        $order_status = $user_data[$now_count]->order_status; //大筆訂單狀態
                        $order_id = $user_data[$now_count]->order_id;
                        
                        $order_date = $user_data[$now_count]->order_date;
                        $order_last_return_date = $user_data[$now_count]->order_last_return_date;
                        date_default_timezone_set("Asia/Taipei");
                        $today= date("Y-m-d");
                        $day = (strtotime($order_last_return_date) - strtotime($today)) / (60 * 60 * 24);
                        $order_return_date = $user_data[$now_count]->order_return_date;
                        $account = $user_data[$now_count]->user_account;
                        $name_data=DB::select('select nickname from users where account = ?', [$account]);
                        $name=$name_data[0]->nickname;
                    @endphp

    @if ($order_status == 1)
    <div class="card PUcardtop">
        <div class="card-header opwhite" style="text-align: center;padding:
                    8px;background-color:#66BAB7">
            <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$name}}<br>借用編號:{{ $order_id }}</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
                    8px;background-color:#0069d9">
            <p class="userfontfamily2 tooltitle " style="color:white">借用情況:借用中</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
                    8px;">
            <p class="userfontfamily2 filefont">
                借用時間: {{ $order_date }}
                最慢歸還日: {{ $order_last_return_date }}

                剩餘天數: {{ $day }}天
            </p>
        </div>

        <div class="card-body opwhite" style=" padding: 0;">
            <div class="container">
                <div class="row">
                    @php
                        $pic_data=DB::select('select order_pic from ordertab_pic where order_id = ?',[$order_id]);
                        $pic=$pic_data[0]->order_pic;
                    @endphp
                    <div class="col">
                            <p class="userfontfamily2 tooltitle" style="    display: block;">借用照片</p>
                            <img src="../../uploads/PUmountain/order_out/{{$pic}}" style="margin-bottom:15px" class="borrowimg">
                        </div>

                    
                </div>
            </div>
        </div>
        <input type="button" value="管理代歸還" class="btn btn-primary addtext userfontfamily2" name="update_button" style="height: 80px;font-size: 40px;"
            onclick="location.href='https://bakerychu.ddns.net/PUmountain/sendreturnpicview/{{ $order_id }}'">
    </div>

    <div class="orderdivider"></div>

    

    @endif
    @php
    $now_count = $now_count + $countdata;
    @endphp
    @endfor

    </div>

    </div>
    </div>
@endsection
