<div class="modal fade" id="deleterulemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">刪除規則</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <form action="{{route('admin.deleterule')}}" method="post" id="deleteitem">

            <div class="modal-bodu" style="text-align: center;">
                <p class="modal-title userfontfamily3 changename_modalsize" id="deleterulecontext"></p>
            </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @csrf
                <input type="hidden" name="deleteruleid" id="deleteruleid">
                <button type="submit" class="btn btn-primary">刪除規則</button>
                </form>
              </div>
        </div>
    </div>

</div>