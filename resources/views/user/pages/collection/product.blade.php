<div class="allproduct">
    <h3>The Collection</h3>
</div>

<div class="product">
    <div class="container-fluid">
        <div class="noidung">
            @foreach ($collection as $key => $item)
                <a data-toggle="modal" href='#model_{{$key}}'>
                    <div class="motsp">
                        <figure>
                            <div class="layoutsp">
                                <div class="lockanh">
                                    <img src="{{$item->image}}" alt="{{$item->title}}"
                                         class="img-responsive">
                                </div>
                                <div class="anhmosp"></div>
                            </div>
                            <figcaption>{{$item->id}}</figcaption>
                            <p class="price">{{number_format($item->price)}} VND</p>
                        </figure>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
