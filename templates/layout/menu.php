<div class="menu <?=($source!='index') ? "menuIn":""?> <?=($banner==true) ? "menuInForBanner":""?>">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="info-left d-flex align-items-center justify-content-between">
            <div id="mmenu"></div>
            <?=$func->get_photo_static("logo",THUMBS."/144x26x2",true);?>
        </div>
        <ul class="d-flex align-items-center justify-content-between">
            <li class="hover-product-list">
                <a class="transition <?php if($com=='product') echo 'active'; ?>" href="product" title="<?=sanpham?>"><?=sanpham?></a>
                <?php if (count($splistmenu) > 0) {?>
                    <div class="box-menu">
                        <div class="in-box-menu d-flex align-items-start justify-content-between flex-wrap">
                            <ul class="box-menu-left">
                                <li class="hover-show-cat active" data-list="0"><a href="product" title="Tất cả sản phẩm">Tất cả sản phẩm</a></li>
                                <?php foreach ($splistmenu as $key => $value) {?>
                                    <li class="hover-show-cat" data-list="<?=$value['id']?>"><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>"><?=$value['ten']?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="box-menu-right">
                                <div class="item-box-menu-right active show-cat-0 d-flex align-items-start justify-content-between flex-wrap">
                                    <ul class="box-menu-right-cat"></ul>
                                    <div class="img">
                                        <h3 class="name">DOWNLOAD CATALOG FOR FREE!</h3>
                                        <?=$func->get_photo_static("banner-san-pham",THUMBS."/320x200x1",false);?>
                                    </div>
                                </div>
                                <?php foreach ($splistmenu as $key => $value) {
                                    $cat = $d->rawQuery("select ten$lang as ten, tenkhongdau$lang as tenkhongdau, id from #_product_cat where type = ? and id_list = ? and hienthi > 0 order by stt,id desc",array('product',$value['id']));
                                    ?>
                                    <div class="item-box-menu-right show-cat-<?=$value['id']?> d-flex align-items-start justify-content-between flex-wrap">
                                        <ul class="box-menu-right-cat">
                                            <?php foreach ($cat as $key1 => $value1) {?>
                                                <li><a href="<?=$value1['tenkhongdau']?>" title="<?=$value1['ten']?>"><?=$value1['ten']?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <div class="img">
                                            <h3 class="name"><?=$value['ten']?></h3>
                                            <?=$func->get_photo_static("",THUMBS."/320x200x1",false,UPLOAD_PRODUCT_L.$value['photo']);?>
                                            <div class="desc line-3"><?=strip_tags(htmlspecialchars_decode($value['mota']))?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </li>
            <li><a class="transition <?php if($com=='dowload-catalog') echo 'active'; ?>" href="dowload-catalog" title="Catalog">Catalog</a></li>
            <li><a class="transition <?php if($com=='contact') echo 'active'; ?>" href="contact" title="<?=lienhe?>"><?=lienhe?></a></li>
            <li><a class="transition <?php if($com=='du-toan-cong-trinh') echo 'active'; ?>" href="du-toan-cong-trinh" title="Dự toán công trình">Dự toán công trình</a></li>
        </ul>
        <div class="info-right d-flex align-items-center justify-content-between">
            <div class="search-res">
                <p class="icon-search transition"></p>
                <div class="search-grid w-clear">
                    <input type="text" name="keyword" id="keyword" placeholder="<?=nhaptukhoatimkiem?>" onkeypress="doEnter(event,'keyword');"/>
                    <p onclick="onSearch('keyword');"><i class="fa fa-search"></i></p>
                </div>
            </div>
            <a class="menu-map" target="_blank" href="<?=$optsetting['linkmap']?>" title="Map"></a>
            <div class="menu-login">
                <span class="icon"></span>
                <?php if(array_key_exists($login_member, $_SESSION) && $_SESSION[$login_member]['active'] == true) { ?>
                    <div class="user-header">
                        <a href="account/thong-tin">
                            <span>Hi, <?=$_SESSION[$login_member]['username']?></span>
                        </a>
                        <a href="account/thong-tin">
                            <i class="fas fa-heart"></i>
                            <span>Sản phẩm đã thích</span>
                        </a>
                        <a href="account/dang-xuat">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?=dangxuat?></span>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="user-header">
                        <a href="account/dang-nhap">
                            <i class="fas fa-sign-in-alt"></i>
                            <span><?=dangnhap?></span>
                        </a>
                        <a href="account/dang-ky">
                            <i class="fas fa-user-plus"></i>
                            <span><?=dangky?></span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>