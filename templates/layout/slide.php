<?php if(count($slider)) { ?>
    <div class="slick__page slider" :show="1" :arrows="true" :fade="true" :animate="animate__shakeX, animate__bounceIn, animate__fadeIn, animate__fadeInDown, animate__flipInX, animate__rotateInDownLeft">
        <?php foreach($slider as $v) { ?>
            <div class="item-slider position-relative animate__animated">
                <a href="<?=$v['link']?>" target="_blank">
                    <div class="img img-object">
                        <?=$func->get_photo_static("",THUMBS."/1366x625x1",false,UPLOAD_PHOTO_L.$v['photo']);?>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>