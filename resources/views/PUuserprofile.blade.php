<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <title>靜宜大學登山社</title>
    <script>
       
    </script>

</head>

<body class="bodyimg PUcontainer">

    <div>
        <header class="PUnavheader">
            @include('layouts.navbar')
        </header>

        <section id="" class="mobilemargintop">

            @include('layouts.alert')

            <div class='container PUprofile'>
                <div class="row justify-content-center align-items-center">
                    <div class="col col-sm-8 align-self-center">

                        <div class="card PUcard border-w-6 " id="usercardstyle">

                            <div class="card-header ">
                                <p class="userfontfamily2 loginsize">{{Auth::user()->nickname}}</p>
                            </div>
                            <div class="row ">
                                <div class="col text-center" style="margin-top: 25px;">
                                    <img src=" {{asset("uploads/userpic/".Auth::user()->picture)}} "
                                        class="card-img-top userpicture" alt="似乎無法載入呢!">
                                </div>
                            </div>
                            <div class="card-body ">

                                @if(Auth::user()->is_admin==1)
                                <div class="row">
                                    <div class="col text-center">
                                        <button onclick="location.href='{{route('admin.page')}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            管理模式
                                        </button>
                                    </div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-6 col-sm-6 text-center">
                                        <button
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                            data-bs-toggle="modal" data-bs-target="#changenpasswordmodal">
                                            修改密碼
                                        </button>
                                        @include('profile_modal.changenpasswordmodal')
                                    </div>

                                    <div class="col-6 col-sm-6 text-center">
                                        <button
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                            data-bs-toggle="modal" data-bs-target="#changenpicturemodal">
                                            修改頭貼
                                        </button>
                                        @include('profile_modal.changenpicturemodal')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button onclick="location.href='{{route('auth.logout')}}'"
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                            登出
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


    <div style="height: 100px;">

    </div>
</body>

</html>

{{-- <button class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
    data-bs-toggle="modal" data-bs-target="#changennicknamemodal">
    修改名子
</button>
@include('profile_modal.changennicknamemodal') --}}