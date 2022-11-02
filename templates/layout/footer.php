<div class="footer">
    <div class="footer__top pt-5 pb-5">
        <div class="container flex-wrap d-flex align-items-start justify-content-between">
            <div class="item__footer">
                <div class="info-footer"><?=htmlspecialchars_decode($footer['noidung'.$lang])?></div>
                <?=$func->get_photo("mangxahoi1","","social social-header",""); ?>
            </div>
            <div class="item__footer">
                <h2 class="title-footer"><?=chinhsach?></h2>
                <ul class="footer-ul">
                    <?php foreach($cs as $v) { ?>
                        <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>">- <?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="item__footer">
                <h2 class="title-footer"><?=dangkynhantin?></h2>
                <p class="slogan-footer"><?=slogandangkynhantin?></p>
                <form class="form-newsletter validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                    <div class="newsletter-footer">
                        <input type="email" class="form-control" id="email-newsletter" name="data[email]" placeholder="<?=nhapemail?>" required />
                        <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                    </div>
                    <div class="newsletter-button">
                        <input type="submit" name="submit-newsletter" value="<?=gui?>" disabled>
                        <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                        <input type="hidden" name="data[type]" value="dangkynhantin">
                    </div>
                </form>
            </div>
            <div class="item__footer">
                <h2 class="title-footer">Fanpage facebook</h2>
                <?=$addons->setAddons('fanpage-facebook', 'fanpage-facebook', 10);?>
            </div>
        </div>
    </div>
    <?php if (count(@$tagsProduct)>0) {?>
        <div class="footer-tags">
            <div class="container pb-0">
                <p class="label-tags">Tags từ khóa sản phẩm:</p>
                <ul class="list-tags w-clear">
                    <?php foreach($tagsProduct as $v) { ?>
                        <li><a class="transition text-decoration-none" href="<?=$v[$sluglang]?>" target="_blank" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <?php if (count(@$tagsNews)>0) {?>
        <div class="footer-tags">
            <div class="container">
                <p class="label-tags">Tags từ khóa tin tức:</p>
                <ul class="list-tags w-clear">
                    <?php foreach($tagsNews as $v) { ?>
                        <li><a class="transition text-decoration-none" href="<?=$v[$sluglang]?>" target="_blank" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <div class="footer__bottom">
        <div class="container d-flex align-items-center justify-content-between">
            <p class="info">2021 Copyright <?=$setting['ten'.$lang]?>. Design by LeAgency</p>
            <p class="info">
                <span><?=dangonline?>: <?=$online?></span>
                <span><?=homnay?>: <?=$counter['today']?></span>
                <span><?=homqua?>: <?=$counter['yesterday']?></span>
                <span><?=trongtuan?>: <?=$counter['week']?></span>
                <span><?=trongthang?>: <?=$counter['month']?></span>
                <span><?=tongtruycap?>: <?=$counter['total']?></span>
            </p>
        </div>
    </div>
    <?=$addons->setAddons('footer-map', 'footer-map', 10);?>
    <?=$addons->setAddons('messages-facebook', 'messages-facebook', 10);?>
</div>
<?php if($com!='gio-hang') { ?>
    <a class="cart-fixed text-decoration-none" href="gio-hang" title="Giỏ hàng">
        <i class="fas fa-shopping-bag"></i>
        <span class="count-cart"><?=(isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
    </a>
<?php } ?>
<a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/<?=preg_replace('/[^0-9]/','',$optsetting['zalo']);?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/zl.png" alt="Zalo"></i>
</a>
<a class="btn-phone btn-frame text-decoration-none" href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img src="assets/images/hl.png" alt="Hotline"></i>
</a>