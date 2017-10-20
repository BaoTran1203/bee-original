$(function () {

    $('.thongbao').addClass('thongbaothanhcong').one('webkitAnimationEnd', function (event) {
        $('.thongbao').removeClass('thongbaothanhcong');
    });

    $('.sukienqc img').addClass('sukienra');
    $('.nenmenutrai').addClass('nenmenutraira')
    var thoigian = setInterval(function () {
        $('.sukienqc img').removeClass('sukienra');
        $('.nenmenutrai').removeClass('nenmenutraira');
        clearInterval(thoigian);
    }, 2500)
    $hieuung = $('.noidung').isotope({
        // options
        itemSelector: '.motsp',
        layoutMode: 'masonry'
    });
    $hieuung.imagesLoaded().progress(function () {
        $hieuung.isotope('layout');
    });
    /*click menu*/
    $('.menu ul.navbar-nav li a i.fa.fa-bars').on('click', function (event) {
        event.preventDefault();
        /* Act on the event */
        $('.menutrai').toggleClass('menura');
        $('.nenmenutrai').addClass('nenmenutraira')
    });

    $('.menutrai a i.fa.fa-times, .nenmenutrai').click(function (event) {
        $('.menutrai').removeClass('menura');
        $('.nenmenutrai').removeClass('nenmenutraira')
        $('.sukienqc img').removeClass('sukienra');
        return false;
    });

    $(window).scroll(function (event) {
        vitrihientai = $('html,body').scrollTop();
        console.log(vitrihientai);
        if (vitrihientai > 199) {
            $('.menu ul.navbar-nav li a i.fa.fa-bars, .menu ul.navbar-nav li a i.fa.fa-cart-plus, .menu ul.navbar-nav li a i.fa.fa-facebook-official, .menu ul.navbar-nav li a i.fa.fa-instagram, .menu ul.navbar-nav li a i.fa.fa-user-circle').addClass('thugon');
            $('.menu .navbar-brand img').addClass('logogon')
            $('.menu .textlogo').addClass('textlogogon')
        }
        if (vitrihientai > 999) {
            $('.nutlen').addClass('nutlenra')
        }
        else if (vitrihientai < 999) {
            $('.nutlen').removeClass('nutlenra')
        }
    });
    $('.nutlen').click(function (event) {
        $('html,body').animate({scrollTop: 0}, 1300, "easeInOutExpo")
        $('.menutrai').removeClass('menura');
        $('.nenmenutrai').removeClass('nenmenutraira')
    });
    $('.menutrai ul li:nth-child(2) a.tenmenutrai,.menu ul.navbar-nav li:nth-child(2) a.tenmenu').click(function (event) {
        $('html,body').animate({scrollTop: $('.about').offset().top}, 1300, "easeInOutExpo")
        $('.menutrai').removeClass('menura');
        $('.nenmenutrai').removeClass('nenmenutraira')

    });
    $('.menutrai ul li:nth-child(3) a.tenmenutrai,.menu ul.navbar-nav li:nth-child(3) a.tenmenu,.slider .item .carousel-caption a.btn').click(function (event) {
        $('html,body').animate({scrollTop: $('.product').offset().top}, 1300, "easeInOutExpo")
        $('.menutrai').removeClass('menura');
        $('.nenmenutrai').removeClass('nenmenutraira')
    });
    $('.menutrai ul li:nth-child(4) a.tenmenutrai,.menu ul.navbar-nav li:nth-child(4) a.tenmenu').click(function (event) {
        $('html,body').animate({scrollTop: $('footer').offset().top}, 1300, "easeInOutExpo")
        $('.menutrai').removeClass('menura');
        $('.nenmenutrai').removeClass('nenmenutraira')
    });

})