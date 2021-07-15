<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
        <link rel="stylesheet" href="{{ asset('css/PUmountain/table.css') }}">
</head>

<body class="bodyimg" >

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
        </header>

        <section id="" class="mobilemargintop">
            @include('layouts.alert')

            <div class='container PUprofile'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="    background-color: #c2deea;">

                            <div class="card-header ">
                                <p class="userfontfamily2 loginsize">社員管理</p>
                            </div>

                            <div class="card-body ">
                                {{ $users->links("pagination::bootstrap-4") }}
                                <table class="table table-striped rwd-table" style="background-color: white;"
                                    id="table">
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
                                        @foreach ($users as $user)
                                        <tr>
                                            <td data-th="ID" id="id">{{ $user->id }}</td>
                                            <td data-th="姓名" id="name">{{ $user->nickname }}</td>
                                            <td data-th="帳號" id="account">{{ $user->account }}</td>
                                            <td data-th="密碼" id="password">{{ $user->password }}</td>
                                            <td data-th="信箱" id="email">{{ $user->contact_email }}</td>
                                            <td data-th="Line" id="line">{{ $user->contact_line }}</td>
                                            <td data-th="升為管理員" class="change">
                                                @if ($user->is_admin == 0)
                                                <form action="{{route('admin.promotion')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <input type="submit" value="升為管理員"
                                                        class="btn btn-primary addtext userfontfamily2 "
                                                        onclick="do_click();">
                                                </form>
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