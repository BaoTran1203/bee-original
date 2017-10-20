@if(count($sliders) > 0)
    <div class="slider">
        <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0; $i < count($sliders); $i++)
                    @if($i == 0)
                        <li data-target="#carousel-id" data-slide-to="{{$i}}" class="active"></li>
                    @else
                        <li data-target="#carousel-id" data-slide-to="{{$i}}" class=""></li>
                    @endif
                @endfor
            </ol>
            <div class="carousel-inner">
                @for($i = 0; $i < count($sliders); $i++)
                    @if($i == 0)
                        {!! '<div class="item active">' !!}
                    @else
                        {!! '<div class="item ">' !!}
                    @endif
                    <img src="{{$sliders[$i]->image}}" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$sliders[$i]->title}}</h1>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Enter</a>
                            </p>
                        </div>
                    </div>
                    {!! '</div>' !!}
                @endfor

            </div>
            @if(count($sliders) > 1)
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span
                            class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span
                            class="glyphicon glyphicon-chevron-right"></span></a>
            @endif
        </div>
    </div>
@endif