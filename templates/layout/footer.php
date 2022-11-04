<div class="footer">
    <div class="footer__top">
        <div class="container flex-wrap d-flex align-items-start justify-content-between">
            <div class="item__footer flex-wrap d-flex align-items-start justify-content-between">
                <div class="item__info-social d-flex align-items-center">
                    <span>Follow us:</span>
                    <?=$func->get_photo("mangxahoi","","social",""); ?>
                </div>
                <div class="item__info-social">
                    <span>Liên hệ:</span>
                    <p><?=$optsetting['email']?></p>
                </div>
                <div class="item__info-social">
                    <p><?=$optsetting['dienthoai']?></p>
                </div>
                <div class="item__info-social">
                    <p><?=$optsetting['hotline']?></p>
                </div>
            </div>
            <div class="item__footer">
                <h2 class="title-footer">Sản phẩm</h2>
                <ul class="footer-ul">
                    <?php foreach($listProductFooter as $v) { ?>
                        <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="item__footer">
                <h2 class="title-footer">Dịch vụ</h2>
                <ul class="footer-ul">
                    <?php foreach($quytrinhFooter as $v) { ?>
                        <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="item__footer">
                <h2 class="title-footer">Giá trị</h2>
                <ul class="footer-ul">
                    <?php foreach($qualityFooter as $v) { ?>
                        <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="item__footer">
                <h2 class="title-footer">Về chúng tôi</h2>
                <ul class="footer-ul">
                    <?php foreach($aboutFooter as $v) { ?>
                        <li><a class="text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="top-footer__bottom">
                <span>Online: <?=$online?></span>
                <span>|</span>
                <span><?=tongtruycap?>: <?=$counter['total']?></span>
            </div>
            <div class="bottom-footer__bottom d-flex align-items-center justify-content-between">
                <p class="info">© 2022 <?=$setting['ten'.$lang]?>. All Right Reserved.</p>
                <form class="form-newsletter d-flex align-items-center justify-content-between flex-wrap validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                    <input type="email" class="form-control" id="email-newsletter" name="data[email]" placeholder="Email của bạn" required />
                    <input type="submit" name="submit-newsletter" value="Đăng ký" disabled>
                    <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                    <input type="hidden" name="data[type]" value="dangkynhantin">
                </form>
            </div>
            
        </div>
    </div>
</div>
<div class="show-social">
    <a target="_blank" href="mailto:<?=$optsetting['email']?>" title="Email us">
        <span class="icon"></span>
        <span>Email us</span>
    </a>
    <div class="scrollToTop"><img src="assets/images/top.jpg" alt="Go Top"/></div>
</div>