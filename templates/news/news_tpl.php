<div class="title-website"><span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span></div>
<div class="content-main content-main-news">
    <?php if(isset($news) && count($news) > 0) { ?>
        <div class="row__item__page">
            <?php $funcLayout->setTbl('news');?>
            <?php $funcLayout->setClass('news item__page');?>
            <?php $funcLayout->setHvr('scale-img');?>
            <?php $funcLayout->infoTheme("news");?>
            <?php $funcLayout->setVarible($news);?>
            <?php $funcLayout->setType($type);?>
            <?php $funcLayout->setImage($config['theme'][$type]['dir'], $config['theme'][$type]['column'], $config['theme'][$type]['size']);?>
            <?php $funcLayout->getTheme(); ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
</div>