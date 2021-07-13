<div class="modal fade" id="deleteitemmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">刪除裝備</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.deleteequipment')}}" method="post" id="deleteitem">
                @csrf
                <input type="hidden" name="deleteid" id="deleteid">
                <button type="submit" class="btn btn-primary">確認刪除</button>
                </form>
              </div>
        </div>
    </div>
    @include('layouts.resetform')

</div>