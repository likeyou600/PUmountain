<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
</head>

<body class="bodyimg">
    <header class="PUnavheader">
        @include('layouts.navbar')
        @include('layouts.alert')
    </header>
    <div class="backdiv">
        <input type="button" class="back" onclick="location.href='{{route('admin.page')}}'" value="回到管理選單">
    </div>
    <div class="allnews">
        <p class="newstext contact_text">管理公告</p>
        <div class="card-header opwhite" style="text-align: center;padding: 8px;">
            <input type="button" class="btn btn-primary addtext userfontfamily2 btncolor" value="新增公告"
                onclick="location.href='{{route('admin.bulletin.newckedit')}}'">
        </div>
        @php
        $bulletins=App\Models\Bulletin::all()->sortByDesc('id');
        @endphp
        <table class="table table-striped">
            <tr class="datetext" style="color: #000000bf!important;
            ">
                <th>
                    POSTDATE
                </th>
                <th>
                    TITLE
                </th>
                <th>
                    Edit
                </th>
            </tr>
            @foreach ($bulletins as $bulletin)
            @php
            $dt=new DateTime($bulletin->created_at);
            $dt=$dt->modify("-1911 year");
            $dt=ltrim($dt->format("Y.m.d"),"0")
            @endphp
            <tr>
                <td class="datetext">
                    {{$dt}}
                </td>
                <td class="contact_text">
                    <a href="{{route('bulletin.detail',[$bulletin->id])}}" style="    font-family: 'Noto Sans TC', sans-serif;">{{$bulletin->title}}</a>
                </td>
                <td class="contact_text">
                    <form action="{{route('admin.bulletin.editckedit')}}" method="post"
                        style="display: contents!important;">
                        @csrf
                        <input type="hidden" name="id" value="{{$bulletin->id}}">
                        <button type="submit" style="border: none;
                        background-color: #ffffff00;"><i class="fas fa-edit"></i></button>

                    </form>
                    <i style="cursor: pointer;" class="fas fa-trash-alt" data-bs-toggle="modal"
                        data-bs-target="#deletebulletinmodal"
                        onclick="bulletindelete({{$bulletin->id}},'{{$bulletin->title}}');"></i>
                </td>
            </tr>
            @endforeach
            @include('admin.bulletin.deletebulletin_modal')
            <script>
                function bulletindelete($id,$title){
                    $('#deletebulletinid').val($id);
                    $('#bulletintitle').text($title);
                };
            </script>
        </table>

    </div>
</body>

</html>