<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <title>靜宜大學登山社</title>
    <script>
        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>

</head>

<body class="bodyimg PUcontainer">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
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
                                    <div class="col text-center">
                                        <button
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                            data-bs-toggle="modal" data-bs-target="#changennicknamemodal">
                                            修改名子
                                        </button>
                                        <div class="modal fade" id="changennicknamemodal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="border-radius: 2.3rem;">
                                                    <div class="modal-header">
                                                        <p class="modal-title userfontfamily3 changename_modalsize"
                                                            id="exampleModalCenterTitle">修改名子</p>
                                                        <button type="button"  class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('auth.change_nickname')}}"
                                                            id="changennickname" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                    placeholder="請用本名歐~" name="newnickname">

                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-primary userfontfamily3">確定更改</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('layouts.resetform')
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col text-center">
                                        <button
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                            data-bs-toggle="modal" data-bs-target="#changenpicturemodal">
                                            修改頭貼
                                        </button>



                                        <div class="modal fade" id="changenpicturemodal" tabindex="-1"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="border-radius: 2.3rem;">
                                                    <div class="modal-header">
                                                        <p class="modal-title userfontfamily3 changename_modalsize"
                                                            id="exampleModalCenterTitle">修改頭貼</p>
                                                        <button type="button"  class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>

                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('auth.change_picture')}}"
                                                            id="change_profilepicture" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">

                                                            <div class="form-group">
                                                                <label class="btn updatepic" style="background-color: #55c1d2;">
                                                                    <input id="usernewpic" name="usernewpic" style="display:none;" type="file" accept="image/* , .heic" />
                                                                    <i class="fa fa-photo"></i> 選擇新的頭貼
                                                                </label>
                                    
                                                                <img id="usernewpic_output" style="    width: 40vh;" />
                                                                <script src="/PUmountain/js/picture.js"></script>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit"
                                                            class="btn btn-primary userfontfamily3">確定更改</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('layouts.resetform')
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-center">
                                        <button
                                            class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                            data-bs-toggle="modal" data-bs-target="#changenpasswordmodal">
                                            修改密碼
                                        </button>
                                        <div class="modal fade" id="changenpasswordmodal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="border-radius: 2.3rem;">
                                                    <div class="modal-header">
                                                        <p class="modal-title userfontfamily3 changename_modalsize"
                                                            id="exampleModalCenterTitle">修改密碼</p>
                                                        <button type="button"  class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('auth.change_password')}}"
                                                            id="changenpassword" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="請輸入舊密碼" name="oldpassword"
                                                                    required="required">
                                                                <input type="text" class="form-control" style="    margin: 10px 0px;
                                                                    " placeholder="請輸入新密碼" name="password"
                                                                    required="required">
                                                                <input type="text" class="form-control"
                                                                    placeholder="請再一次輸入新密碼" name="password_confirmation"
                                                                    required="required">
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-primary userfontfamily3">確定更改</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('layouts.resetform')
                                        </div>
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