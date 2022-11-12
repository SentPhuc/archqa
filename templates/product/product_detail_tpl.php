<div class="box-detail">
    <div class="container">
        <div class="box-detail-content product d-flex align-items-start justify-content-between flex-wrap">
            <div class="item__col">
                <div class="title-website title-viewsMore"><span><?=$row_detail['ten'.$lang]?></span></div>
                <div class="slick__page" :show='1' :autoplay='true'>
                    <a class="thumb-detail" data-fancybox='thumb-detail' href="<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
                        <img onerror="this.src='<?=THUMBS?>/900x640x2/assets/images/noimage.png';" src="<?=THUMBS."/900x640x1/".UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten'.$lang]?>">
                    </a>
                    <?php foreach($gallery as $v) { ?>
                        <a class="thumb-detail" data-fancybox='thumb-detail' href="<?=UPLOAD_PRODUCT_L.$v['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
                            <img onerror="this.src='<?=THUMBS?>/900x640x2/assets/images/noimage.png';" src="<?=THUMBS."/900x640x1/".UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?=$row_detail['ten'.$lang]?>">
                        </a>
                    <?php } ?>
                </div>
                <div class="social-plugin mt-3">
                    <span>Chia sẻ với chúng tôi:</span>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_linkedin"></a>
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    </div>
                </div>
            </div>
            <div class="item__col">
                <div class="header-form-product">
                    <div class="title-website title-viewsMore"><span>Yêu cầu sản phẩm</span></div>
                    <div class="info">
                        <a href="javascript:;" class="text-decoration-none transition">
                            <img src="assets/images/icon27.png" alt="">
                            <?=$row_detail['luotxem']?>
                        </a>
                        <a data-id="<?=$row_detail['id']?>" data-event="like" data-table="product" data-type="product" class="handle-event handle-event-<?=$row_detail['id']?> text-decoration-none" href="javascript:;" title="Like">
                            <img src="assets/images/icon28.png" alt="">
                            <span class="couter-like"><?=$row_detail['countLike'] ?></span>
                        </a>
                        <a data-id="<?=$row_detail['id']?>" data-user="<?=!empty($_SESSION[$login_member]['id']) ? $_SESSION[$login_member]['id'] : 0?>" data-event="save" data-table="product_save" data-type="product" class="handle-event handle-event-<?=$row_detail['id']?> text-decoration-none <?=$func->checkSave($row_detail['id'],$type)?>" href="javascript:;" title="Save">
                            <span>(+)</span>
                            <?php if ($func->checkSave($row_detail['id'],$type)=='active-save') {?>
                                Đã lưu
                            <?php }else{ ?>
                                Lưu
                            <?php } ?>
                        </a>
                    </div>
                    <div class="desc">
                        Vui lòng gửi cho chúng tôi chi tiết dự án và sơ đồ mặt bằng của bạn. Chúng tôi sẽ báo giá cho bạn trong vòng 24 giờ!
                    </div>
                </div>
                <form class="form-getquote-detail d-flex align-items-center justify-content-between flex-wrap validation-getquote-detail" novalidate method="post" action="bao-gia" enctype="multipart/form-data">
                    <div class="input-getquote-detail w-100">
                        <input type="text" name="data[ten]" placeholder="*Tên" class="form-control" required>
                    </div>
                    <div class="input-getquote-detail">
                        <input type="text" name="data[email]" placeholder="*Email" class="form-control" required>
                    </div>
                    <div class="input-getquote-detail">
                        <input type="text" name="data[dienthoai]" placeholder="*Phone" class="form-control" required>
                    </div>
                    <div class="input-getquote-detail w-100">
                        <input type="text" name="data[diachi]" placeholder="*Địa chỉ" class="form-control" required>
                    </div>
                    <div class="input-getquote-detail w-100">
                        <label>Sản phẩm cần thiết *</label>
                        <div id="inputPreview" class="flex-wrap">
                            <?php foreach ($splist as $key => $value) {?>
                                <input value="<?=$value['id']?>" name="data[product][]" id="product-detail-<?=$value['id']?>" type="checkbox" class="css-checkbox">
                                <label for="product-detail-<?=$value['id']?>"><?=$value['ten']?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="input-getquote-detail w-100">
                        <input type="text" name="data[qty]" placeholder="*Số lượng" class="form-control" required>
                    </div>
                    <div class="input-getquote-detail w-100">
                        <textarea name="data[noidung]" placeholder="*Nội dung" class="form-control" required></textarea>
                    </div>
                    <div class="input-getquote-detail file w-100">
                        <label for="file1">
                            <span>Chọn tệp</span>
                            Không có tệp nào được chọn
                        </label>
                        <input type="file" name="file1" id="file1" class="d-none">
                    </div>
                    <div class="text-center w-100">
                        <input type="submit" name="submit-getquote-detail" value="Đăng ký ngay" disabled>
                    </div>
                    <input type="hidden" name="recaptcha_response_yeucausanpham" id="recaptchaResponseYeucausanpham">
                    <input type="hidden" name="data[type]" value="yeucausanpham">
                </form>
            </div>
        </div>
        <hr>
        <div class="tabs-detail mt-5">
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-secondary active show" id="info-product-tab" data-toggle="tab" href="#info-product" role="tab" aria-controls="info-product" aria-selected="true"><?=thongtinsanpham?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-secondary" id="comment-product-tab" data-toggle="tab" href="#comment-product" role="tab" aria-controls="comment-product" aria-selected="false"><?=binhluan?></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane rp-images fade show active" id="info-product" role="tabpanel" aria-labelledby="info-product-tab">
                    <?=(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') ? htmlspecialchars_decode($row_detail['noidung'.$lang]) : ''?>
                </div>
                <div class="tab-pane fade" id="comment-product" role="tabpanel" aria-labelledby="comment-product-tab">
                    <div class="fb-comments" data-href="<?=$func->getCurrentPageURL()?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($orderingProcess)) {?>
        <div class="container"><hr class="mt-5 mb-0"></div>
        <div class="box-OrderingProcess pd50-0">
            <div class="container">
                <div class="title-website"><span>Quy trình đặt hàng</span></div>
                <div class="box d-flex align-items-center justify-content-between flex-wrap">
                    <?php foreach ($orderingProcess as $key => $value) {?>
                        <a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>" class="item__OrderingProcess text-decoration-none text-center">
                            <div class="img">
                                <div class="img-top transition">
                                    <img onerror=src="<?=THUMBS."/36x36x1/"?>assets/images/noimage.png" src="<?=THUMBS."/36x36x2/".UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
                                </div>
                                <div class="img-bottom transition">
                                    <span>
                                        <img onerror=src="<?=THUMBS."/22x22x1/"?>assets/images/noimage.png" src="<?=THUMBS."/22x22x2/".UPLOAD_NEWS_L.$value['photo1']?>" alt="<?=$value['ten']?>">
                                    </span>
                                </div>
                            </div>
                            <h3 class="name"><?=$value['ten']?></h3>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="box-infoOther productOther background-gray pt70">
        <div class="container">
            <?php if(isset($product) && count($product) > 0) { ?>
                <div class="title-website title-viewsMore">
                    <span>Sản phẩm liên quan</span>
                </div>
                <div class="row__item slick__page slick__page-themeArraw" :show="3" :autoplay="true" :arrows="true" :lg-item="3" :md-item="3" :sm-item="2" :xs-item="1">
                    <?php $funcLayout->setTbl('product');?>
                    <?php $funcLayout->setClass('item__product item'); ?>
                    <?php $funcLayout->setHvr('scale-img');?>
                    <?php $funcLayout->infoTheme('san-pham');?>
                    <?php $funcLayout->setVarible($product);?>
                    <?php $funcLayout->setType("product");?>
                    <?php $funcLayout->setImage($config['theme'][$type]['dir'], $config['theme'][$type]['column'], $config['theme'][$type]['size']);?>
                    <?php $funcLayout->getTheme(); ?>
                </div>
            <?php } ?>
            <?php if (!empty($tags)) {?>
                <div class="box-tags">
                    <div class="title-box">
                        Tags từ khóa của <?=@$title_crumb?> <?=$setting['ten'.$lang]?>
                    </div>
                    <div class="box d-flex align-items-start justify-content-between flex-wrap">
                        <?php foreach ($tags as $key => $value) {?>
                            <a class="text-decoration-none transition" href="<?=$value['tenkhongdau'.$lang]?>" title="<?=$value['ten'.$lang]?>"><?=$value['ten'.$lang]?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($contentPro)) {?>
                <div class="box-contentProduct">
                    <?=htmlspecialchars_decode($contentPro)?>
                </div>
            <?php } ?>
            <?php if (!empty($getQA)) {?>
                <div class="box-productQa">
                    <div class="title-box">
                        Tùy chỉnh lựa chọn <?=@$title_crumb?> tại <?=$setting['ten'.$lang]?>
                    </div>
                    <div class="box">
                        <?php foreach ($getQA as $key => $value) {?>
                            <div class="item__Qa">
                                <span class="title">+ <?=$value['ten'.$lang]?></span>
                                <div class="desc"><?=$value['mota'.$lang]?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="pd70-0">
                <?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
            </div>
        </div>
    </div>
</div>