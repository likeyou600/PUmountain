<div class="modal fade" id="newlinkmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">新增新連結</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.addnewlink')}}" id="changenpassword"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <select class="form-select userfontfamily4" aria-label="Default select example"
                            name="year" style="    font-size: 25px;
                                                    margin-bottom: 25px;">
                            <option selected value="0">選取學年分</option>
                            @foreach ($years as $year)
                            <option value="{{$year->id}}" class="userfontfamily4">{{$year->year}}</option>                                
                            @endforeach 
                        </select>
                        <input type="text" class="form-control" placeholder="請輸入活動名稱" name="name" autocomplete="off"
                            required="required" style="margin-bottom: 25px">
                            請輸入網址
                            <input type="url" class="form-control" placeholder="請輸入網址" name="site" autocomplete="off"
                            required="required" value="https://">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary userfontfamily3">確定新增</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.resetform')
</div>