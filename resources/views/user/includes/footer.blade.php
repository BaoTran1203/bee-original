<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 text-center">
                <div class="contact">
                    <img src="{{URL::asset('images/others/logo-all.png')}}" alt=""
                         class="img-responsive">
                    <h3>Bee Bracelet</h3>
                    <p class="address">Address: {{$contact['address']}}</p>
                    <p class="phone">Phone: {{$contact['phone']}} - Email: {{$contact['email']}}</p>
                    <p class="open">Open Paily: 9h00-21h00</p>
                    <div class="nut">
                        <a href="tel:{{$contact['phone']}}" target="_blank"
                           class="fa fa-phone"></a>
                        <a href="https://maps.google.com/?q={{$contact['address']}}&t=m"
                           target="_blank" class="fa fa-home"></a>
                        <a href="mailto:{{$contact['email']}}" target="_blank"
                           class="fa fa-send"></a>
                        <a href="{{$contact['facebook']}}" target="_blank"
                           class="fa fa-facebook"></a>
                        <a href="{{$contact['instagram']}}" target="_blank"
                           class="fa fa-instagram"></a>
                    </div>
                    <p class="end">@ Copyright 2017 THÁI KHƯƠNG. All Rights Reserved. Web coder:
                        TMH.,Ltd </p>
                </div>
            </div>
        </div>
    </div>
</footer>