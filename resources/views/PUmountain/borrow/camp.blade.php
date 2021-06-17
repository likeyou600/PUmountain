@extends('PUmountain.borrow.PUborrow')

@section('camp')
    <div class="row">

        @php
            $quantity = count($borrow_camp);
        @endphp
        @for ($time = 0; $time < $quantity; $time++)
            @php
                $category = $borrow_camp[$time]->items_category;
                $value = $borrow_camp[$time]->items_quantity;
                $id = $borrow_camp[$time]->items_id;
                $pic = $borrow_camp[$time]->items_picture;
            @endphp
            <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                <div class="card PUcardtop">
                    @if ($value > 0)
                        <img src="../picture/PUmountain/borrow/camp/{{ $pic }}" class="card-img-top">
                        <form action="https://bakerychu.ddns.net/PUmountain/add-to-cart" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="category" value="{{$category}}">   
                        <input type="hidden" name="id" value="{{$id}}">   
                        <div class="PUcardbody">
                            <p class="userfontfamily2 filefont">剩餘數量: {{ $value }} 個</p>
                            <div class="input-group mb-3">
                                
                                   
                                <input type="number" class="userfontfamily2 filefont" value="0" min="0" max={{$value}} step="1" name="select" />
                                

                            </div>
                            <input type="submit" value="加到借用清單" class="btn btn-primary addtext" onclick="do_click()">
                          
                        </div>
                        </form>
                    @else
                        <img src="../picture/PUmountain/borrow/camp/{{ $pic }}" class="card-img-top">
                        <img src="../picture/PUmountain/borrow/out.png" class="outborrowimg card-img-top">
                        <div class="PUcardbody">
                            <p class="userfontfamily2 filefont">剩餘數量: {{ $value }} 個</p>
                            <div class="input-group mb-3">
                                <input type="number" class="userfontfamily2 filefont"  value="0" min="0" max={{$value}} step="1" name="select" />
                            </div>
                            <a class="btn btn-primary addtext" style="background-color:#f03535">已經被借走了哦!</a>
                        </div>
                    @endif
                </div>

            </div>
        @endfor
    </div>
@endsection
