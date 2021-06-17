<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <title>靜宜大學登山社</title>
    <link rel="stylesheet" href="{{ asset('css/PUmountain/table.css') }}">
    <script>
        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
</head>
<div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
<body class="bodyimg" style="height: 770px;">
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
                                <p class="userfontfamily2 loginsize">社員管理</p>
                            </div>

                            <div class="card-body ">
                                {{ $userdata->links("pagination::bootstrap-4") }}
                                <table class="table table-striped rwd-table" style="background-color: white;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">姓名</th>
                                            <th scope="col">帳號</th>
                                            <th scope="col">密碼</th>
                                            <th scope="col">信箱</th>
                                            <th scope="col">Line</th>
                                            <th scope="col">升為管理員</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userdata as $item)
                                            <tr>
                                                <td data-th="ID" id="id">{{ $item->id }}</td>
                                                <td data-th="姓名" id="name">{{ $item->nickname }}</td>
                                                <td data-th="帳號" id="account">{{ $item->account }}</td>
                                                <td data-th="密碼" id="password">{{ $item->password }}</td>
                                                <td data-th="信箱" id="email">{{ $item->contactEmail }}</td>
                                                <td data-th="Line" id="line">{{ $item->contactLINE }}</td>
                                                <td data-th="升為管理員" class="change">
                                                    @if ($item->admin == 0)
                                                        <input type="button" value="升為管理員" class="btn btn-primary addtext userfontfamily2 "
                                                            onclick="do_click();location.href='/PUmountain/admin/changetoadmin/{{ $item->id }}'">
                                                </td>

                                                
                                            @else
                                                <input type="button" value="已為管理員" style="background-color: red"
                                                    class="btn btn-primary addtext userfontfamily2 "></td>
                                        @endif
                                        </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                                
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </section>
    </div>


</body>

</html>
