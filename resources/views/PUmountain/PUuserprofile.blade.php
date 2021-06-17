<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
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
    <div class=" ">
        <header class="PUnavheader">
            
            @include('PUmountain.layouts.navbar')
    </header>

    <section id="llooggiinn">
        @if (Session::has('userprofile'))
        <div id="useralert" class="alert alert-success animate__animated animate__bounce alertsize" role="alert"
            style="margin-bottom: -35px;z-index: 5;">
            <p class="alerttext userfontfamily3">{{ Session::get('userprofile') }}</p>
        </div>
        @endif
        <script type="text/javascript">
            window.setTimeout(function() {
            $('#useralert').alert('close');
        }, 4000);

        </script>

        <div class='container PUprofile'>
            <div class="row justify-content-center align-items-center">
                <div class="col align-self-center">

                    <div class="card PUcard border-w-6 " id="usercardstyle">

                        <div class="card-header ">
                            <p class="userfontfamily2 loginsize">{{ session('username') }}</p>
                        </div>
                        <div class="row ">
                            <div class="col text-center" style="margin-top: 25px;">
                                <img src="uploads/PUmountain/userpic/{{ Session::get('userpicture') }}"
                                    class="card-img-top userpicture" alt="似乎無法載入呢!">
                            </div>
                        </div>
                        <div class="card-body ">
                            
                            @if(Session::get('admin')==1)
                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/admin'"
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
                                        data-toggle="modal" data-target="#changenpicturemodal">
                                        修改頭貼
                                    </button>
                                    <div class="modal fade" id="changenpicturemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 200">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" style="border-radius: 2.3rem;">
                                                <div class="modal-header">
                                                    <p class="modal-title userfontfamily3 changename_modalsize"
                                                        id="exampleModalCenterTitle">修改頭貼</p>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" id="btnResetForm">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="https://bakerychu.ddns.net/PUmountain/change_profilepicture"
                                                        id="change_profilepicture" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input  "
                                                                    name="profilepicture" id="profilepicture">
                                                                <label class="custom-file-label userfontfamily3"
                                                                    style="font-size: 21px;"
                                                                    for="profilepicture">選擇新的頭貼</label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        onclick="do_click();event.preventDefault();document.getElementById('change_profilepicture').submit();"
                                                        class="btn btn-primary userfontfamily3">確定更改</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        data-toggle="modal" data-target="#changenpasswordmodal">
                                        修改密碼
                                    </button>
                                    <div class="modal fade" id="changenpasswordmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" style="border-radius: 2.3rem;">
                                                <div class="modal-header">
                                                    <p class="modal-title userfontfamily3 changename_modalsize"
                                                        id="exampleModalCenterTitle">修改密碼</p>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" id="btnResetForm">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="https://bakerychu.ddns.net/PUmountain/change_password"
                                                        id="changenpasswordmodal1" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="form-group">
                                                            
                                                                <input type="text" class="form-control" placeholder="請輸入舊密碼"
                                                                    name="oldpassword">
                                                                    <input type="text" class="form-control" style="    margin: 10px 0px;
                                                                    " placeholder="請輸入新密碼"
                                                                    name="newpassword" >
                                                                    <input type="text" class="form-control" placeholder="請再一次輸入新密碼"
                                                                    name="checkpassword">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        onclick="event.preventDefault();document.getElementById('changenpasswordmodal1').submit();"
                                                        class="btn btn-primary userfontfamily3">確定更改</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/myorder'"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                        借用情況
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/logout'"
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
   
    {{-- 圖片更換js --}}
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        bsCustomFileInput.init()
        var btn = document.getElementById('btnResetForm')
        var formpro = document.getElementById('change_profilepicture')

        btn.addEventListener('click', function() {
            formpro.reset()
        })

    </script>
    {{-- 圖片更換js end --}}

    <div style="height: 100px;">

    </div>
</body>

</html>