<!DOCTYPE html>
<html lang="zh-TW">

<head>

    @include('layouts.head')
</head>

<body class="bodyimg">

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')

        </header>

        <div class='container PUprofile mobilemargintop'>
            <div class="row justify-content-center align-items-center">
                <div class="col align-self-center">

                    <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                        <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                            <p class="userfontfamily2 tooltitle ">活動照片</p>
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

                                        @if($counter%2==0)
                                        <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                            @endif
                                            <input type="button" class="btn btn-secondary" value="{{$year->year}}"
                                                onclick="location.href='{{route( 'ActivityPicture',[$year->year])}}'">
                                            @php
                                            $counter+=1;
                                            @endphp

                                            @if($counter%2==0)
                                        </div>
                                        @endif

                                        @endforeach

                                    </div>
                                </div>


                                <div class="col-sm-9 col-12 itempadding" style="background-color:#f1f2f4">
                                    <div class="row">
                                        @foreach($items as $item)
                                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                            <input type="button"
                                                class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                                onclick="location.href='{{$item->site}}}'"
                                                value="{{$item->location}}">
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