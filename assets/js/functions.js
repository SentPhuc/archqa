function modalNotify(text)
{
    $("#popup-notify").find(".modal-body").html(text);
    $('#popup-notify').modal('show');
}

function ValidationFormSelf(ele='')
{
    if(ele)
    {
        $("."+ele).find("input[type=submit]").removeAttr("disabled");
        var forms = document.getElementsByClassName(ele);
        var validation = Array.prototype.filter.call(forms,function(form){
            form.addEventListener('submit', function(event){
                if(form.checkValidity() === false)
                {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }
}

function loadPagingAjax(url='',eShow='')
{
    if($(eShow).length && url)
    {
        $.ajax({
            url: url,
            type: "GET",
            data: {
                eShow: eShow
            },
            success: function(result){
                $(eShow).html(result);
            }
        });
    }
}

function doEnter(event,obj,type='')
{
    if(event.keyCode == 13 || event.which == 13) onSearch(obj,type);
}

function onSearch(obj,type='') 
{           
    var keyword = $("#"+obj).val();
    
    if(keyword=='')
    {
        modalNotify(language['no_keywords']);
        return false;
    }
    else
    {
        if (type) {
            var url = pathFilters;
        }else{
            var url = "tim-kiem";
        }
        location.href = url+'?keyword='+encodeURI(keyword);
        loadPage(document.location);            
    }
}

function goToByScroll(id)
{
    var offsetMenu = 0;
    id = id.replace("#", "");
    if($(".menu").length) offsetMenu = $(".menu").height();
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top - (offsetMenu * 2)
    }, 'slow');
}

function update_cart(id=0,code='',quantity=1)
{
    if(id)
    {
        var ship = $(".price-ship").val();

        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            dataType: 'json',
            data: {cmd:'update-cart',id:id,code:code,quantity:quantity,ship:ship},
            success: function(result){
                if(result)
                {
                    $('.load-price-'+code).html(result.gia);
                    $('.load-price-new-'+code).html(result.giamoi);
                    $('.price-temp').val(result.temp);
                    $('.load-price-temp').html(result.tempText);
                    $('.price-total').val(result.total);
                    $('.load-price-total').html(result.totalText);
                }
            }
        });
    }
}

function load_district(id=0)
{
    $.ajax({
        type: 'post',
        url: 'ajax/ajax_district.php',
        data: {id_city:id},
        success: function(result){
            $(".select-district").html(result);
            $(".select-wards").html('<option value="">'+language['wards']+'</option>');
        }
    });
}

function load_wards(id=0)
{
    $.ajax({
        type: 'post',
        url: 'ajax/ajax_wards.php',
        data: {id_district:id},
        success: function(result){
            $(".select-wards").html(result);
        }
    });
}

function load_ship(id=0)
{
    if(ship)
    {
        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            dataType: 'json',
            data: {cmd:'ship-cart',id:id},
            success: function(result){
                if(result)
                {
                    $('.load-price-ship').html(result.shipText);
                    $('.load-price-total').html(result.totalText);
                    $('.price-ship').val(result.ship);
                    $('.price-total').val(result.total);
                }   
            }
        }); 
    }
}

function getTypeUrlFilter(key,id,type) {
    var url_bystyle = '',url_bycolor = '',url_byfinisheffect = '',url_bylayout = '',url_bymaterial = '',url_byconfiguration = '',url_bytype = '';
    var url = '';
    var id_bystyle = ($("#id_bystyle").val() > 0) ? $("#id_bystyle").val() : 0;
    var id_bycolor = ($("#id_bycolor").val() > 0) ? $("#id_bycolor").val() : 0;
    var id_byfinisheffect = ($("#id_byfinisheffect").val() > 0) ? $("#id_byfinisheffect").val() : 0;
    var id_bylayout = ($("#id_bylayout").val() > 0) ? $("#id_bylayout").val() : 0;
    var id_bymaterial = ($("#id_bymaterial").val() > 0) ? $("#id_bymaterial").val() : 0;
    var id_byconfiguration = ($("#id_byconfiguration").val() > 0) ? $("#id_byconfiguration").val() : 0;
    var id_bytype = ($("#id_bytype").val() > 0) ? $("#id_bytype").val() : 0;
    if (type=='cat') {
        if (key=='id_bystyle') {
            url_bystyle = key+'='+id+'&';
            if (id_bycolor > 0) {
                url_bycolor = 'id_bycolor='+id_bycolor+'&';
            }
            if (id_byfinisheffect > 0) {
                url_byfinisheffect = 'id_byfinisheffect='+id_byfinisheffect+'&';
            }
            if (id_bylayout > 0) {
                url_bylayout = 'id_bylayout='+id_bylayout+'&';
            }
            if (id_bymaterial > 0) {
                url_bymaterial = 'id_bymaterial='+id_bymaterial+'&';
            }
            if (id_byconfiguration > 0) {
                url_byconfiguration = 'id_byconfiguration='+id_byconfiguration+'&';
            }
            if (id_bytype > 0) {
                url_bytype = 'id_bytype='+id_bytype+'&';
            }
            if (id == 0 && key=='id_bystyle') {
                url = url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }

        if (key=='id_bycolor') {
            if (id_bystyle > 0) {
                url_bystyle = 'id_bystyle='+id_bystyle+'&';
            }
            url_bycolor = key+'='+id+'&';
            if (id_byfinisheffect > 0) {
                url_byfinisheffect = 'id_byfinisheffect='+id_byfinisheffect+'&';
            }
            if (id_bylayout > 0) {
                url_bylayout = 'id_bylayout='+id_bylayout+'&';
            }
            if (id_bymaterial > 0) {
                url_bymaterial = 'id_bymaterial='+id_bymaterial+'&';
            }
            if (id_byconfiguration > 0) {
                url_byconfiguration = 'id_byconfiguration='+id_byconfiguration+'&';
            }
            if (id_bytype > 0) {
                url_bytype = 'id_bytype='+id_bytype+'&';
            }
            if (id == 0 && key=='id_bycolor') {
                url = url_bystyle + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }

        if (key=='id_byfinisheffect') {
            if (id_bystyle > 0) {
                url_bystyle = 'id_bystyle='+id_bystyle+'&';
            }
            if (id_bycolor > 0) {
                url_bycolor = 'id_bycolor='+id_bycolor+'&';
            }
            url_byfinisheffect = key+'='+id+'&';
            if (id_bylayout > 0) {
                url_bylayout = 'id_bylayout='+id_bylayout+'&';
            }
            if (id_bymaterial > 0) {
                url_bymaterial = 'id_bymaterial='+id_bymaterial+'&';
            }
            if (id_byconfiguration > 0) {
                url_byconfiguration = 'id_byconfiguration='+id_byconfiguration+'&';
            }
            if (id_bytype > 0) {
                url_bytype = 'id_bytype='+id_bytype+'&';
            }
            if (id == 0 && key=='id_byfinisheffect') {
                url = url_bystyle + url_bycolor + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }

        if (key=='id_bylayout') {
            if (id_bystyle > 0) {
                url_bystyle = 'id_bystyle='+id_bystyle+'&';
            }
            if (id_bycolor > 0) {
                url_bycolor = 'id_bycolor='+id_bycolor+'&';
            }
            if (id_byfinisheffect > 0) {
                url_byfinisheffect = 'id_byfinisheffect='+id_byfinisheffect+'&';
            }
            url_bylayout = key+'='+id+'&';
            if (id_bymaterial > 0) {
                url_bymaterial = 'id_bymaterial='+id_bymaterial+'&';
            }
            if (id_byconfiguration > 0) {
                url_byconfiguration = 'id_byconfiguration='+id_byconfiguration+'&';
            }
            if (id_bytype > 0) {
                url_bytype = 'id_bytype='+id_bytype+'&';
            }
            if (id == 0 && key=='id_bylayout') {
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bymaterial + url_byconfiguration + url_bytype;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }

        if (key=='id_bymaterial') {
            if (id_bystyle > 0) {
                url_bystyle = 'id_bystyle='+id_bystyle+'&';
            }
            if (id_bycolor > 0) {
                url_bycolor = 'id_bycolor='+id_bycolor+'&';
            }
            if (id_byfinisheffect > 0) {
                url_byfinisheffect = 'id_byfinisheffect='+id_byfinisheffect+'&';
            }
            if (id_bylayout > 0) {
                url_bylayout = 'id_bylayout='+id_bylayout+'&';
            }
            url_bymaterial = key+'='+id+'&';
            if (id_byconfiguration > 0) {
                url_byconfiguration = 'id_byconfiguration='+id_byconfiguration+'&';
            }
            if (id_bytype > 0) {
                url_bytype = 'id_bytype='+id_bytype+'&';
            }
            if (id == 0 && key=='id_bymaterial') {
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_byconfiguration + url_bytype;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }

        if (key=='id_byconfiguration') {
            if (id_bystyle > 0) {
                url_bystyle = 'id_bystyle='+id_bystyle+'&';
            }
            if (id_bycolor > 0) {
                url_bycolor = 'id_bycolor='+id_bycolor+'&';
            }
            if (id_byfinisheffect > 0) {
                url_byfinisheffect = 'id_byfinisheffect='+id_byfinisheffect+'&';
            }
            if (id_bylayout > 0) {
                url_bylayout = 'id_bylayout='+id_bylayout+'&';
            }
            if (id_bymaterial > 0) {
                url_bymaterial = 'id_bymaterial='+id_bymaterial+'&';
            }
            url_byconfiguration = key+'='+id+'&';
            if (id_bytype > 0) {
                url_bytype = 'id_bytype='+id_bytype+'&';
            }
            if (id == 0 && key=='id_byconfiguration') {
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_bytype;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }

        if (key=='id_bytype') {
            if (id_bystyle > 0) {
                url_bystyle = 'id_bystyle='+id_bystyle+'&';
            }
            if (id_bycolor > 0) {
                url_bycolor = 'id_bycolor='+id_bycolor+'&';
            }
            if (id_byfinisheffect > 0) {
                url_byfinisheffect = 'id_byfinisheffect='+id_byfinisheffect+'&';
            }
            if (id_bylayout > 0) {
                url_bylayout = 'id_bylayout='+id_bylayout+'&';
            }
            if (id_bymaterial > 0) {
                url_bymaterial = 'id_bymaterial='+id_bymaterial+'&';
            }
            if (id_byconfiguration > 0) {
                url_byconfiguration = 'id_byconfiguration='+id_byconfiguration+'&';
            }
            url_bytype = key+'='+id+'&';

            if (id == 0 && key=='id_bytype') {
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration;
            }else{
                url = url_bystyle + url_bycolor + url_byfinisheffect + url_bylayout + url_bymaterial + url_byconfiguration + url_bytype;
            }
        }
    } else if(type=='sort'){
        if (id_bystyle > 0) {
            url += 'id_bystyle='+id_bystyle+'&';
        }
        if (id_bycolor > 0) {
           url += 'id_bycolor='+id_bycolor+'&';
       }
       if (id_byfinisheffect > 0) {
           url += 'id_byfinisheffect='+id_byfinisheffect+'&';
       }
       if (id_bylayout > 0) {
           url += 'id_bylayout='+id_bylayout+'&';
       }
       if (id_bymaterial > 0) {
           url += 'id_bymaterial='+id_bymaterial+'&';
       }
       if (id_byconfiguration > 0) {
           url += 'id_byconfiguration='+id_byconfiguration+'&';
       }
       if (id_bytype > 0) {
           url += 'id_byconfiguration='+id_byconfiguration+'&';
       }
       if ($('#keywordProuct').val()) {
        url += 'keyword='+$('#keywordProuct').val()+'&';
    }
    url += 'sort='+key+'&';
}

return url;
}