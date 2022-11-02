/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");

/* Exists */
$.fn.exists = function(){
    return this.length;
};

/* Paging ajax */
if($(".paging-product").exists())
{
    loadPagingAjax("ajax/ajax_product.php?perpage="+COUNTPRODUCT+"&type=san-pham",'.paging-product');
}

/* Paging category ajax */
if($(".paging-product-category").exists())
{
    $(".paging-product-category").each(function(){
        var list = $(this).data("list");
        loadPagingAjax("ajax/ajax_product.php?perpage="+COUNTPRODUCT+"&type=san-pham&idList="+list,'.paging-product-category-'+list);
    })
}
WEBSIETE.video = function(){
    $('body').on("click",".item-video",function(){
        var id = $(this).attr('data-id');
        var width = $(this).attr('data-width');
        var height = $(this).attr('data-height');
        $.ajax({
            url:'ajax/ajax_video.php',
            type: "POST",
            dataType: 'html',
            data: {id:id,height:height,width:width},
            success: function(result){
                $('.sub-video1').html(result);
            }
        });
    });
};
WEBSIETE.slickData = function(obj){
    // :lg-item="4" :md-item="3" :sm-item="2" :xs-item="1"
    if(obj.length > 0)
    {
        var slidesToShow = Number(obj.attr(':show'));
        var autoplay = (obj.attr(':autoplay')=="false") ? false : true;
        var infinite = (obj.attr(':infinite')=="false") ? false : true;
        var arrows = (obj.attr(':arrows')=="true") ? true : false;
        var dots = (obj.attr(':dots')=="true") ? true : false;
        var vertical = (obj.attr(':vertical')=="true") ? true : false;
        var fade = (obj.attr(':fade')=="true") ? true : false;
        var lg_item = Number(obj.attr(':lg-item'));
        var md_item = Number(obj.attr(':md-item'));
        var sm_item = Number(obj.attr(':sm-item'));
        var xs_item = Number(obj.attr(':xs-item'));

        if((config_responsive==true || config_mobile==true) && (lg_item && md_item && sm_item && xs_item))
        {
            var responsive = [
                {breakpoint: 1024,settings:{slidesToShow: lg_item,}},
                {breakpoint: 992,settings:{slidesToShow: md_item,}},
                {breakpoint: 768,settings:{slidesToShow: sm_item,}},
                {breakpoint: 480,settings:{slidesToShow: xs_item,}},
            ];        
        }
        obj.slick({
            slidesToShow: slidesToShow,
            autoplay: autoplay,
            infinite: infinite,
            arrows: arrows,
            dots: dots,
            vertical: vertical,
            fade: fade,
            // prevArrow: '<p class="left-arrow">←</p>',
            // nextArrow: '<p class="right-arrow">→</p>',
            responsive: responsive,
        });
    };
};
WEBSIETE.slickPage = function(){
    if($(".slick__page").length > 0)
    {
        $(".slick__page").each(function(){
            WEBSIETE.slickData($(this));
        });
    }
};

/* Back to top */
WEBSIETE.BackToTop = function(){
    $(window).scroll(function(){
        if(!$('.scrollToTop').length) $("body").append('<div class="scrollToTop"><img src="'+images_top+'" alt="Go Top"/></div>');
        if($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
        else $('.scrollToTop').fadeOut();
    });

    $('body').on("click",".scrollToTop",function() {
        $('html, body').animate({scrollTop : 0},800);
        return false; 
    });
};

/* Alt images */
WEBSIETE.AltImages = function(){
    $('img').each(function(index, element) {
        if(!$(this).attr('alt') || $(this).attr('alt')=='')
        {
            $(this).attr('alt',company_name);
        }
    });
};

/* Fix menu */
WEBSIETE.FixMenu = function(){
    $(window).scroll(function(){
        if($(window).scrollTop() >= $(".header").height()) $(".menu").css({position:"fixed",left:'0px',right:'0px',top:'0px',zIndex:'999'});
        else $(".menu").css({position:"relative"});
    });
};

/* Tools */
WEBSIETE.Tools = function(){
    if($(".toolbar").exists())
    {
        $(".footer").css({marginBottom:$(".toolbar").innerHeight()});
    }
};

/* Mmenu */
WEBSIETE.Mmenu = function(){
    if($("#mmenu").exists())
    {
        
    }
};

/* Search */
WEBSIETE.Search = function(){
    if($(".icon-search").exists())
    {
        $(".icon-search").click(function(){
            if($(this).hasClass('active'))
            {
                $(this).removeClass('active');
                $(".search-grid").stop(true,true).animate({opacity: "0",width: "0px"}, 200);   
            }
            else
            {
                $(this).addClass('active');                            
                $(".search-grid").stop(true,true).animate({opacity: "1",width: "230px"}, 200);
            }
            document.getElementById($(this).next().find("input").attr('id')).focus();
            $('.icon-search i').toggleClass('fa fa-search fa fa-times');
        });
    }
};

/* Videos */
WEBSIETE.Videos = function(){
    if($(".video").exists())
    {
        $('[data-fancybox="video"]').fancybox({
            transitionEffect: "fade",
            transitionDuration: 800,
            animationEffect: "fade",
            animationDuration: 800,
            arrows: true,
            infobar: false,
            toolbar: true,
            hash: false
        });
    }
};

/* ClickActidve */
WEBSIETE.ClickActidve = function(){
    if($(".menu-login").exists())
    {
        $('.menu-login').click(function(){
            $('.user-header').stop().toggle();
        });
    }

    if($(".hover-product-list").exists())
    {
        $('.hover-product-list').hover(function(){
            if ($('.box-menu').hasClass('active')) {
                $('.box-menu').removeClass("active");
            } else {
                $('.box-menu').addClass("active");
            }
        });
    }

    if($("#mmenu").exists())
    {
        $('#mmenu').click(function(){
            if ($(this).hasClass('active')) {
                $(this).removeClass("active");
                $("#main-mmneu").removeClass("active");
            } else {
                $(this).addClass("active");
                $("#main-mmneu").addClass("active");
            }
        });
    }

    if($(".hover-show-cat").exists())
    {
        $('.hover-show-cat').hover(function(){
            $('.hover-show-cat').removeClass("active");
            $('.item-box-menu-right').removeClass("active");
            var list = $(this).data('list');
            if ($(this).hasClass('active')) {
                $('.show-cat-'+list).removeClass('active');
                $(this).removeClass("active");
            } else {
                $('.show-cat-'+list).addClass('active');
                $(this).addClass("active");
            }
        });
    }
};

/* Ready */
$(document).ready(function(){
    WEBSIETE.slickPage();
    WEBSIETE.Tools();
    WEBSIETE.AltImages();
    WEBSIETE.BackToTop();
    // WEBSIETE.FixMenu();
    WEBSIETE.video();
    WEBSIETE.Videos();
    WEBSIETE.Search();
    WEBSIETE.ClickActidve();
});