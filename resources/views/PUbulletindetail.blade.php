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

        <p class="newstext contact_text">{{$bulletin->title}}</p>
        <p class=" contact_text" style="margin: 0">公告時間: {{$bulletin->created_at}} <br>發文者: {{$poster}}</p>

    </div>

    <div class="allnews content" style="    word-wrap: break-word;
    overflow: hidden;">

        {!! html_entity_decode($bulletin->content) !!}

    </div>
</body>

</html>