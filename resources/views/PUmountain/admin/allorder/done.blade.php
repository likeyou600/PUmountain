@extends('PUmountain.admin.PUallorder')

@section('done')
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
                        $day = (strtotime($order_last_return_date) - strtotime($order_date)) / (60 * 60 * 24);
                        $order_return_date = $user_data[$now_count]->order_return_date;
                        $account = $user_data[$now_count]->user_account;
                        $name_data=DB::select('select nickname from users where account = ?', [$account]);
                        $name=$name_data[0]->nickname;
                    @endphp

@if ($order_status == 0)

    <div class="card PUcardtop">
        <div class="card-header opwhite" style="text-align: center;padding:
    8px;background-color:#66BAB7">
            <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$name}}<br>借用編號: {{ $order_id }}</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
    8px;background-color:red">
            <p class="userfontfamily2 tooltitle " style="color:white">借用情況:已歸還</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
    8px;">
            <p class="userfontfamily2 filefont">
                借用時間: {{ $order_date }}
                最終歸還日: {{ $order_return_date }}
            </p>
        </div>

        <div class="card-body opwhite" style=" padding: 0;">
            <div class="container">
                <div class="row">
                    @php
                        $pic_data=DB::select('select order_returnpic from ordertab_pic where order_id = ?',[$order_id]);
                        $pic=$pic_data[0]->order_returnpic;
                    @endphp
                    <div class="col">
                            <p class="userfontfamily2 tooltitle" style="    display: block;">歸還照片</p>
                            <img src="../../uploads/PUmountain/order_in/{{$pic}}" style="margin-bottom:15px" class="borrowimg">
                        </div>


                </div>
            </div>
        </div>  

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
