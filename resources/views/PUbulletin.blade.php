<!DOCTYPE html>
<html lang="zh-TW">
<head>
    @include('layouts.head')
</head>
<body class="bodyimg">
    <header class="PUnavheader">
        @include('layouts.navbar')
    </header>
    <div class="allnews">
        <p class="newstext contact_text">所有消息</p>
        <table class="table table-striped">
            <tr class="datetext" style="color: #000000bf!important;
            ">
                <th>
                    POSTDATE
                </th>
                <th>
                    TITLE
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
                    <a href="{{route('bulletin.detail',[$bulletin->id])}}">{{$bulletin->title}}</a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</body>
</html>