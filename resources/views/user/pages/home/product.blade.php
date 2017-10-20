<div class="product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-push-2 ">
                <div class="arrivals text-center">
                    <h3>new arrivals</h3>
                </div>
            </div>
        </div>
        <div class="noidung">
            @foreach ($products as $key => $item)
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

<div class="xemnhieu">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <a href="{{url('/collection')}}">All Product</a>
            </div>
        </div>
    </div>
</div>