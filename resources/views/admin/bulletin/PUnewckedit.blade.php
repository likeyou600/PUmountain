<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
</head>

<body class="bodyimg">
    <header class="PUnavheader">
        @include('layouts.navbar')
        @include('layouts.alert')
    </header>
    <div class="container mt-5">
        <form action="{{route('admin.bulletin.createpost')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">
                    <div class="card shadow">

                        <div class="card-header">
                            <h4 class="card-title"> 管理員發布公告 </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label> 標題 </label>
                                <input type="text" class="form-control" name="title" placeholder="請輸入公告標題~">
                            </div>
                            <div class="form-group">
                                <label> 內容 </label>
                                <textarea class="form-control" id="content" placeholder="請輸入公告內容~"
                                    name="content"></textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        ClassicEditor
                .create( document.querySelector( '#content' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
</body>

</html>