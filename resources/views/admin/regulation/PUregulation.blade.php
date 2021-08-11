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

        <section id="" class="">
            @include('layouts.alert')

            <div class='container PUprofile mobilemargintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="background-color: #c2deea;">

                            <div class="card-header ">
                                <p class="userfontfamily2 loginsize">借用規則管理</p>
                            </div>
                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <input type="button" class="btn btn-primary addtext userfontfamily2 btncolor" value="新增規則" data-bs-toggle="modal" data-bs-target="#addrulemodal">
                                @include('admin.regulation.addrule_modal')
                            </div>
                            <div class="card-body ">
                                <table class="table table-striped rwd-table" style="background-color: white;"
                                    id="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">規則</th>
                                            <th scope="col">編輯</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rules as $rule)
                                        <tr>
                                            <td data-th="規則" id="rule">{{ $rule->rule }}</td>
                                            <td data-th="編輯" class="change">
                                                <i style="cursor: pointer; font-size: 30px;" class="fas fa-edit" data-bs-toggle="modal"
                                                data-bs-target="#editruleModal"
                                                onclick="editrule({{$rule->id}},'{{$rule->rule}}');"></i>
                                                <i style="cursor: pointer; font-size: 30px;" class="fas fa-trash-alt" data-bs-toggle="modal"
                                                data-bs-target="#deleterulemodal"
                                                onclick="deleterule({{$rule->id}},'{{$rule->rule}}');"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @include('admin.regulation.editrule_modal')
                                        @include('admin.regulation.deleterule_modal')

                                        <script>
                                            function editrule($id,$rule){
                                                $('#ruleid').val($id);
                                                $('#rulecontext').val($rule);
                                            };
                                            function deleterule($id,$rule){
                                                $('#deleteruleid').val($id);
                                                $('#deleterulecontext').text($rule);
                                            };
                                        </script>



                                    </tbody>
                                </table>
                                
                                <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css"
                                    rel="stylesheet">

                                <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
                                <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js">
                                </script>
                                <script
                                    src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table-locale-all.min.js">
                                </script>
                                <script
                                    src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js">
                                </script>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>


</body>

</html>