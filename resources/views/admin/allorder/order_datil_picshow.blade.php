<div class="card-body opwhite" style=" padding: 0;">
    <div class="container">
        <div class="row">
            @foreach($order_details as $order_detail)
            @php
            $item_id = $order_detail->item_id;
            $category =
            App\Models\Item::find($item_id)->category()->first()->category;
            $pic = $category . '_' . $item_id;
            $items_quantity =$order_detail->quantity;
            @endphp

            <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                <div class="card PUcardtop" style="    margin-bottom: 10px;">
                    <img src="/PUmountain/picture/borrow/{{ $category }}/{{ $pic }}.jpg" class="card-img-top">
                    <p class="userfontfamily2 tooltitle">數量:
                        {{ $items_quantity }}</p>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>