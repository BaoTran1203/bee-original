<div class="tonghop">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 trai">
                <div class="row tren">
                    <div class="col-xs-12 col-sm-12 col-md-12 size">
                        <h3>size</h3>
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked>Boy</label>
                            <label><input type="radio" name="optradio">Girl </label>
                        </div>
                    </div>
                </div>

                <div class="row duoi">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src="{{URL::asset('images/others/size1.JPG')}}" alt=""
                             class="img-responsive">
                        <h3>S <br> (12-14cm)</h3>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src="{{URL::asset('images/others/size2.JPG')}}" alt=""
                             class="img-responsive">
                        <h3>M <br> (15-17cm)</h3>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src="{{URL::asset('images/others/size3.JPG')}}" alt=""
                             class="img-responsive">
                        <h3>L <br> (18-20cm)</h3>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 phai">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-6 phaitrai">
                        <h3>instagram</h3>
                        <a href="{{$contact['instagram']}}" target="_blank"
                           class="btn btn-primary int">@Bee_bracelet</a>

                        <h3>facebook</h3>
                        <a href="{{$contact['facebook']}}" target="_blank"
                           class="btn btn-primary fb">@Bee_bracelet</a>
                    </div>

                    <div class="col-xs-12 col-sm-7 col-md-6 phaiphai">
                        <div class="row">
                            @foreach ($miniProducts as $item)
                                <div class="col-xs-6 col-sm-4 col-md-4 spnho">
                                    <div class="khoinho">
                                        <img src="{{$item->image}}" alt=""
                                             class="img-responsive">
                                        <div class="anhmosp"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>