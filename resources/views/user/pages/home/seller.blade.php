<div class="about">
    <div class="container-fluid">
        <div class="row">
            <?php foreach($sellers as $seller) : ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="bocabout">
                    <img src="{{$seller->image}}" alt="" class="img-responsive">
                    <div class="nenhover"></div>
                    <h3>{{$seller->title}}</h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>