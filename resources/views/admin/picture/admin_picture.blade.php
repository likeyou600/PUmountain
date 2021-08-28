<!DOCTYPE html>
<html lang="zh-TW">

<head>

    @include('layouts.head')
</head>

<body class="bodyimg">

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
                            <p class="userfontfamily2 tooltitle ">活動照片</p>
                        </div>
                        <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                            <input type="button" class="btn btn-primary addtext userfontfamily2 btncolor" value="新增學年分"
                                data-bs-toggle="modal" data-bs-target="#newyearmodal">
                            @include('admin.picture.picture_modal.newyearmodal')
                            <input type="button" class="btn btn-primary addtext userfontfamily2 btncolor" value="新增連結"
                                data-bs-toggle="modal" data-bs-target="#newlinkmodal">
                            @include('admin.picture.picture_modal.newlinkmodal')

                            <input type="button" class="btn btn-primary addtext userfontfamily2 btncolor" value="刪除連結"
                                data-bs-toggle="modal" data-bs-target="#deletelinkmodal">
                            @include('admin.picture.picture_modal.deletelinkmodal')


                        </div>
                        <div class="card-body opwhite" style="    padding: 0;">
                            <div class="row" style="width: 100%;
                            margin-left: 0;">
                                <div class="col-sm-3 col-12" style="background-color: #6c757d;">
                                    <div class="row">
                                        @php
                                        $counter = 0;
                                        @endphp

                                        @foreach ($years as $year)

                                        @php
                                        $counter+=1;
                                        @endphp

                                        @if($counter%2==1)
                                        <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                            @endif

                                            <input type="button" class="btn btn-secondary" value="{{$year->year}}"
                                                onclick="location.href='{{route( 'admin.admin_picture',[$year->year])}}'">

                                            @if($counter%2==0)
                                        </div>
                                        @endif

                                        @endforeach
                                        @if($counter%2==1)
                                    </div>
                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-9 col-12 itempadding" style="background-color:#f1f2f4">
                                <div class="row">
                                    @foreach($items as $item)
                                    <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                        <input type="button"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                            onclick="location.href='{{$item->site}}'" value="{{$item->location}}">
                                    </div>
                                    @endforeach

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
    </div>
</body>

</html>