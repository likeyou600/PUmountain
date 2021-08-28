<div class="modal fade" id="deletelinkmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">刪除連結</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.deletelink')}}" id="changenpassword"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <select class="form-select userfontfamily4" aria-label="Default select example"
                        name="deletesiteid" style="    font-size: 25px;
                                                margin-bottom: 25px;">
                        <option selected value="0">選擇想刪除的連結</option>
                        @foreach ($items as $item)
                        <option value="{{$item->id}}" class="userfontfamily4">{{$item->location}}</option>                                
                        @endforeach 
                    </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary userfontfamily3">確定刪除</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.resetform')
</div>