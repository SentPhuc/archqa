/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");
ValidationFormSelf("validation-getquote");

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
    });
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
    if($(".slick__page").exists())
    {
        $(".slick__page").each(function(){
            WEBSIETE.slickData($(this));
        });
    };
};

/* Back to top */
WEBSIETE.BackToTop = function(){
    $(window).scroll(function(){
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
    };
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
    };
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
    };
};

/* ClickActidve */
WEBSIETE.ClickActidve = function(){
    if($(".menu-login").exists())
    {
        $('.menu-login').click(function(){
            $('.user-header').stop().toggle();
        });
    };

    if($("#mmenu").exists())
    {
        $('#mmenu').click(function(){
            if ($(this).hasClass('active')) {
                $(this).removeClass("active");
                $("#main-mmenu").removeClass("active");
            } else {
                $(this).addClass("active");
                $("#main-mmenu").addClass("active");
            }
        });
    };

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
    };

    if($(".action-menu").exists())
    {
        $('.cat-category').removeClass('active');
        $('.action-menu').click(function(){
            if ($(this).hasClass('active')) {
                $(this).removeClass("active");
                $(this).next('.cat-category').stop().slideUp()
            } else {
                $(this).next('.cat-category').stop().slideDown();
                $(this).addClass("active");
            }
        });
    };

    if($(".views-menuFilter").exists())
    {
        $('.views-menuFilter').click(function(){
            $(this).parent('.item__filter').find('ul').stop().slideToggle('fast');
        });
    };

    if($(".item__Qa").exists())
    {
        $('.item__Qa').click(function(){
            if ($(this).hasClass('active')) {
                $(this).find('.desc').stop().slideUp();
                $(this).removeClass('active');
            }else{
                $(this).find('.desc').stop().slideDown();
                $(this).addClass('active');
            }
        });
    };
};

/* swiper */
WEBSIETE.swiper = function(){
    if($(".oc-bn").exists())
    {
        var swiper = new Swiper('.oc-bn', {
            speed: 500,
            preventClicks: true,
            slidesPerView: "auto",
            centeredSlides: true,
            slideToClickedSlide: true,
            loop: true,
            paginationClickable: true,
            navigation: {
                nextEl: ".oc-next",
                prevEl: ".oc-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    };

    if($(".swiper-quality").exists())
    {
        var swiper = [];
        $('.swiper-quality').each(function(i) {
            $(this).addClass("swiper-quality"+i);
            $(this).siblings(".img-list-prev").addClass("img-list-prev"+i);
            $(this).siblings(".img-list-next").addClass("img-list-next"+i);
            swiper[i] = new Swiper('.swiper-quality' + i, {
                slidesPerView: 1,
                slidesPerGroup: 1,
                loop: true,
                navigation: {
                    nextEl: '.img-list-next' + i,
                    prevEl: '.img-list-prev' + i
                },
                pagination: {
                    el: '.swiper-pagination',
                },
                autoHeight: true,
                breakpoints: {
                    750:{
                        effect : 'slide'
                    }
                },
                on: {
                    slideChangeTransitionStart: function(){
                        $(this.$el[0]).parents('.door-item').find(".thumb-item").eq(this.realIndex).addClass("active").siblings().removeClass("active")
                    }
                }
            });
        });

        $(".thumb-item").on("click mouseenter",function(){
            var i = $(this).parents(".thumb-con").index(".thumb-con");
            $(this).addClass("active").siblings().removeClass("active");
            swiper[i].slideToLoop($(this).index(), 500, false);
        });
    };

    if($(".classper").exists())
    {
        $('.classper .swiper-slide').click(function() {
            $('.classper .swiper-slide').removeClass('on').eq($(this).index()).addClass('on');
            $('.Ideamlis .Ideams').removeClass('on').eq($(this).index()).addClass('on');
            classper.slideTo($(this).index(), 800, false);
        })
        var classper = new Swiper('.classper .swiper-container', {
            preventClicks: false,
            paginationClickable: true,
            slidesPerView: 'auto',
            observer: true,
            observeParents: true,
            prevButton: '.classper .bl',
            nextButton: '.classper .br',
            pagination: '.classper .swiper-pagination',
        });
        classper.slideTo($('.classper .swiper-slide.on').index(), 800, false);
        $('.pal .page').click(function() {
            $('.pal .page').removeClass('on').eq($(this).index()).addClass('on');
        })
    };
};


WEBSIETE.wardrobeScroll = function(e, i) {
    function o(e, o) {
        for (var s = o.length - 1; s >= 0; s--){
            if (e + n >= o[s]) {
                $(i).find(".item__quality").eq(s).addClass("active").siblings().removeClass("active");
                break;
            }
            e + n < o[0] ? $(i).find(".container").removeClass("fixed") : $(i).find(".container").addClass("fixed");
        }
    }

    var s = [],
    t = $(window).scrollTop(),
    n = 120;
    $(e).each(function() {
        s.push($(this).position().top);
    }), o(t, s), $(window).scroll(function() {
        t = $(this).scrollTop(), o(t, s);
    }), $(i).find(".item__quality").click(function() {
        var e = $(this).index();
        $("html, body").animate({ scrollTop: s[e] - n});
    });
};

/* Fix menu */
WEBSIETE.FixMenu = function(){
    $(window).scroll(function(){
        if($(window).scrollTop() >= $(".menu").height()) $(".menu").addClass('fixed');
        else $(".menu").removeClass('fixed');
    });
};

/* Filter Product */
WEBSIETE.FilterProduct = function(){
    if($(".filter-item").exists())
    {
        $('.filter-item').click(function(){
            var url = '';
            var id = $(this).data('id');
            var key = $(this).data('key');
            var type = $(this).data('type');
            url += getTypeUrlFilter(key,id,type);
            var allUrl = '?' + url;
            window.location.href = pathFilters+allUrl.slice(0,-1);
        });
    };
};

/* Filter Product */
WEBSIETE.handleEvent = function(){
    if($(".handle-event").exists())
    {
        $('body').on('click','.handle-event',function(){
            var id = $(this).data('id');
            var event = $(this).data('event');
            var table = $(this).data('table');
            var type = $(this).data('type');
            var user = $(this).data('user') > 0 ? $(this).data('user') : 0;
            if (event=='like') {
                var storage = window.localStorage;
                var storage_str_data = storage.getItem("plike_data");
                var storage_json_data = JSON.parse(storage_str_data);
                if (!storage_json_data) {
                    storage_json_data = {}
                }
                const status = check_like_status(storage_json_data, id);
                if (status) {
                    notifyToast('Bạn đã thích nó rồi','error');
                    return;
                }
            }
            if (event=='save' && user == 0) {
                notifyToast('Bạn cần đăng nhập để lưu vào danh sách yêu thích','error');
                setTimeout(function(){
                    window.location.href = 'account/dang-nhap';
                }, 3000);
                return;
            }
            $.ajax({
                url:'ajax/ajax_event.php',
                type: "POST",
                dataType: 'Json',
                data: {id:id,event:event,table:table,type:type,user:user},
                success: function(result){
                    if (result.status == 'success') {
                        if (event=='like') {
                            try {
                                storage_json_data[id] = true;
                            } catch (e) {
                                window.localStorage.clear();
                            }
                            const d = JSON.stringify(storage_json_data);
                            try {
                                storage.setItem("plike_data", d);
                            } catch (e) {
                                if (e.code == 22) {
                                    window.localStorage.clear();
                                    storage.setItem("plike_data", d);
                                }
                            }
                            $('.handle-event-'+id).find('.couter-like').html(result.countLike);
                        }
                        if (event=='save') {
                            $('.handle-event-'+id).addClass('active-save');
                        }
                        notifyToast(result.message,result.status);
                    }else {
                        notifyToast(result.message,result.status);
                        return false;
                    }
                }
            });
        });
    };
};

/* Ready */
$(document).ready(function(){
    WEBSIETE.slickPage();
    WEBSIETE.Tools();
    WEBSIETE.AltImages();
    WEBSIETE.BackToTop();
    WEBSIETE.video();
    WEBSIETE.Videos();
    WEBSIETE.Search();
    WEBSIETE.ClickActidve();
    WEBSIETE.swiper();
    WEBSIETE.FixMenu();
    WEBSIETE.FilterProduct();
    WEBSIETE.wardrobeScroll('.door-item', '.main-navPage');
    WEBSIETE.handleEvent();
});