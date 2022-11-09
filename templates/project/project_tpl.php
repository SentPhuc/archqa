<div class="box-project">
    <div class="container">
        <?php if (!empty($describeProject)) {?>
            <div class="project__outstanding">
                <div class="header-project__outstanding">
                    <span><?=$describeProject['ten']?></span>
                    <div class="desc line-3">
                        <?=$describeProject['mota']?>
                    </div>
                </div>
                <div class="box d-flex align-items-start justify-content-between flex-wrap">
                    <?php foreach ($project as $key => $value) {?>
                        <a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>" class="text-decoration-none item-project__outstanding">
                            <div class="img">
                                <img onerror=src="<?=THUMBS."/640x380x1/"?>assets/images/noimage.png" src="<?=THUMBS."/640x380x1/".UPLOAD_PROJECT_L.$value['photo']?>" alt="<?=$value['ten']?>">
                            </div>
                            <div class="info transition">
                                <div class="in-info">
                                    <h3 class="name"><?=$value['ten']?></h3>
                                    <span class="units"><?=$value['units']?> đơn vị</span>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="text-center mt-3">
                    <a href="<?=@$pro_list[0]['tenkhongdau'.$lang]?>" title="Views more project" class="btn-project text-decoration-none transition">Views more project</a>
                </div>
            </div>
        <?php } ?>
        <?php if (@$idl > 0) {?>
            <?php if(isset($project) && count($project) > 0) { ?>
                <div class="row__item">
                    <?php $funcLayout->setTbl('project');?>
                    <?php $funcLayout->setClass('item__project item'); ?>
                    <?php $funcLayout->setHvr('scale-img');?>
                    <?php $funcLayout->infoTheme('project');?>
                    <?php $funcLayout->setVarible($project);?>
                    <?php $funcLayout->setType("project");?>
                    <?php $funcLayout->setImage($config['theme'][$type]['dir'], $config['theme'][$type]['column'], $config['theme'][$type]['size']);?>
                    <?php $funcLayout->getTheme(); ?>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning mt-3" role="alert">
                    <strong><?=khongtimthayketqua?></strong>
                </div>
            <?php } ?>
            <div class="clear"></div>
            <div class="pagination-home mb-4"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
        <?php } ?>
    </div>
</div>
<?php if (!empty($bannerProject) && $bannerProject['hienthi']==1) {?>
    <div class="banner-project" style="background:url(<?=THUMBS.'/1920x470x1/'.UPLOAD_PHOTO_L.$bannerProject['photo']?>) no-repeat center/cover;">
        <div class="container d-flex align-items-start justify-content-between flex-wrap">
            <span><?=$bannerProject['ten']?></span>
            <a class="btn-project text-decoration-none transition" href="dowload-catalog" title="Liên hệ ngay">Liên hệ ngay</a>
        </div>
    </div>
<?php } ?>
<?php if (!empty($newsProject)) {?>
    <div class="box__newsProject pd60-0">
        <div class="container">
            <?php foreach ($newsProject as $key => $value) {
                $limit = '';
                $attributes = 'class="img"';
                if ($value['theme']==0 || $value['theme']==1) {
                    $limit = ' limit 0,3';
                }
                if ($value['theme']==2) {
                    $attributes = 'class="slick__page img" :show="1" :arrows="true"';
                }
                $imagesMutil = $d->rawQuery("select photo from #_gallery where id_photo = ? and com='news' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc $limit",array($value['id'],$value['type'],'news-project'));
                $statistical = $d->rawQuery("select ten$lang as ten,value from #_gallery where id_photo = ? and com='news' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc",array($value['id'],$value['type'],'thongke'));
                ?>
                <div class="item-news__project theme-<?=$value['theme']?> d-flex align-items-end justify-content-between flex-wrap">
                    <div <?=$attributes?>>
                        <?php foreach ($imagesMutil as $key => $valueImages) {
                            $thumb = '/635x600x1/'
                            ?>
                            <?php if ($value['theme']==0) {
                                $thumb = "/635x400x1/";
                                if ($key!=0) {
                                    $thumb = "/312x190x1/";
                                }
                                ?>
                                <div class="item-imgNews__project">
                                    <img onerror=src="<?=THUMBS.$thumb?>assets/images/noimage.png" src="<?=THUMBS.$thumb.UPLOAD_NEWS_L.$valueImages['photo']?>" alt="<?=$value['ten']?>">
                                </div>
                            <?php }else if($value['theme']==1){ 
                                $thumb = "/312x190x1/";
                                if ($key==2) {
                                    $thumb = "/635x400x1/";
                                }
                                ?>
                                <div class="item-imgNews__project">
                                    <img onerror=src="<?=THUMBS.$thumb?>assets/images/noimage.png" src="<?=THUMBS.$thumb.UPLOAD_NEWS_L.$valueImages['photo']?>" alt="<?=$value['ten']?>">
                                </div>
                            <?php }else{?>
                                <img onerror=src="<?=THUMBS.$thumb?>assets/images/noimage.png" src="<?=THUMBS.$thumb.UPLOAD_NEWS_L.$valueImages['photo']?>" alt="<?=$value['ten']?>">
                            <?php } ?>
                        <?php }?>
                    </div>
                    <div class="info">
                        <h3 class="name">
                            <?=$value['ten']?>
                        </h3>
                        <div class="desc line-3">
                            <?=$value['mota']?>
                        </div>
                        <?php if (!empty($statistical)) {?>
                            <div class="box-statistical d-flex align-items-start justify-content-between flex-wrap">
                                <?php foreach ($statistical as $key1 => $value1) {?>
                                    <div class="item__statistical">
                                        <div class="info d-flex align-items-end flex-wrap">
                                            <h3 class="name"><?=$value1['value']?></h3>
                                            <?php if ($value['theme']==0) {?>
                                                <span>/ mỗi ngày</span>
                                            <?php } ?>
                                        </div>
                                        <span><?=$value1['ten']?></span>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php if(!empty($partner)) { ?>
    <div class="wrap-partner box__partnerProject pd50-0">
        <div class="container">
            <div class="title-website">
                <span>Đối tác toàn cầu của chúng tôi</span>
                <p>Một số đối tác mà công ty chúng tôi đang hợp tác hiện nay trên thị trường mà có thể bạn quan tâm</p>
            </div>
            <?=$func->get_photo("doitac","160x100x1","slick__page text-center",':show="8" :lg-item="5" :md-item="4" :sm-item="3" :xs-item="2" :autoplay="true"'); ?>
        </div>
    </div>
<?php } ?>
<?php if(!empty($serviceProject)) { ?>
    <div class="box__serviceProject d-none pd70-0">
        <div class="container">
            <div class="title">Dịch vụ chuyên nghiệp</div>
            <div class="box d-flex align-items-start justify-content-between flex-wrap">
                <div class="img slick__page" :show="1" :autoplay="true" :arrows="true" :dots="true">
                    <?php foreach ($serviceProject as $key => $value) {?>
                        <img onerror=src="<?=THUMBS."/635x800x1/"?>assets/images/noimage.png" src="<?=THUMBS.'/635x800x1/'.UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
                    <?php } ?>
                </div>
                <div class="info">
                    <?php foreach ($serviceProject as $key => $value) {?>
                        <div class="item__serviceProject">
                            <h3 class="name line-1"><?=$value['ten']?></h3>
                            <div class="desc line-2"><?=$value['mota']?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="pd70-0 background-gray">
    <div class="container">
        <?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
    </div>
</div>