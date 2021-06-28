<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <title>靜宜大學登山社</title>
    <link rel="stylesheet" href="{{ asset('css/PUmountain/table.css') }}">

    <script src="https://bakerychu.ddns.net/PUmountain/bootstrap-input-spinner-master/src/input-spinner.js"></script>
    <script>
        $(function() {
            $("input[type='number']").inputSpinner();
        })

        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }

    </script>
</head>

<body class="bodyimg" style="height: 100vh;">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('PUmountain.layouts.navbar')
        </header>

        <section id="llooggiinn">
            @if (Session::has('message'))
                <div id="useralert" class="alert alert-success animate__animated animate__bounce alertsize" role="alert"
                    style="margin-bottom: -35px;z-index: 5;">
                    <p class="alerttext userfontfamily3">{{ Session::get('message') }}</p>
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

                        <div class="card border-w-6 " id="usercardstyle" style="background-color: darkseagreen;">

                            <div class="card-header ">
                                <p class="userfontfamily2 loginsize">器材添加</p>
                            </div>

                            <div class="card-body  ">
                                <div class="row">
                                    <div class="col text-center">
                                        <form method="POST"
                                            action="https://bakerychu.ddns.net/PUmountain/admin/updatenewitem"
                                            id="update_orderpic" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">

                                                <select class="form-select userfontfamily4"
                                                    aria-label="Default select example" name="newcategory" style="    font-size: 25px;
                                                    margin-bottom: 25px;">
                                                    <option selected value="1">選取新裝備類別</option>
                                                    <option value="mat" class="userfontfamily4">睡墊</option>
                                                    <option value="bag" class="userfontfamily4">睡袋</option>
                                                    <option value="backpack" class="userfontfamily4">大背包</option>
                                                    <option value="camp" class="userfontfamily4">帳篷</option>
                                                    <option value="burner" class="userfontfamily4">爐頭</option>
                                                    <option value="other" class="userfontfamily4">其他</option>
                                                </select>
                                                <input type="number" class="userfontfamily2 filefont" value="0" min="1"
                                                    max=20 step="1" name="select" />

                                                <label class="btn updatepic" style="background-color: #55c1d2;">
                                                    <input id="newitempic" name="newitempic" style="display:none;"
                                                        type="file" accept="image/*" onchange="loadFile(event)" />
                                                    <i class="fa fa-photo"></i> 上傳圖片
                                                </label>
                                                <div >
                                                    <img id="output" style="    width: 40vh;" />
                                                </div>

                                                <script>
                                                    var loadFile = function(event) {
                                                        var output = document.getElementById('output');
                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                        output.onload = function() {
                                                            URL.revokeObjectURL(output.src) // free memory
                                                        }
                                                    };

                                                </script>
                                            </div>
                                            <input type="submit" value="新增新裝備"
                                                class="btn btn-primary addtext userfontfamily2" style="height: 80px;
                                font-size: 40px;width: 100%;" onclick="do_click()">

                                        </form>
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
