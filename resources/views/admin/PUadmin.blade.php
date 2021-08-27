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
        <div class="backdiv">
            <input type="button" class="back" onclick="location.href='{{route('profile')}}'" value="回到儀表板">
        </div>
        <section id="" class="mobilemargintop">
            @include('layouts.alert')


            <div class='container PUprofile'>
                <div class="row justify-content-center align-items-center">
                    <div class="col col-sm-8 align-self-center">

                        <div class="card PUcard border-w-6 " id="usercardstyle">

                            <div class="card-header ">
                                <p class="userfontfamily2 loginsize">管理模式</p>
                            </div>

                            <div class="card-body ">


                                <div class="row">
                                    <div class="col-6 col-sm-6  text-center">
                                        <button onclick="location.href='{{route('admin.member')}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            社員管理
                                        </button>
                                    </div>
                                    <div class="col-6 col-sm-6  text-center">
                                        <button onclick="location.href='{{route('admin.equipment',array('mat'))}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            器材管理
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-sm-6 text-center">
                                        <button onclick="location.href='{{route('admin.allorder',array('all'))}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            社員借用情況
                                        </button>
                                    </div>
                                    <div class="col-6 col-sm-6 text-center">
                                        <button onclick="location.href='{{route('admin.prompters')}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            首頁標題設置
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-sm-6 text-center">
                                        <button onclick="location.href='{{route('admin.regulation')}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            借用規則設定
                                        </button>
                                    </div>

                                    <div class="col-6 col-sm-6 text-center">
                                        <button onclick="location.href='{{route('admin.bulletin.manager')}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            公告管理
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


</body>

</html>