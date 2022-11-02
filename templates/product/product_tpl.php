<div class="title-website"><span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span></div>
<div class="content-main w-clear">
    <?php if(isset($product) && count($product) > 0) { ?>
        <div class="row__item">
            <?php $funcLayout->setTbl('product');?>
            <?php $funcLayout->setClass('item__product item'); ?>
            <?php $funcLayout->setHvr('scale-img');?>
            <?php $funcLayout->infoTheme('san-pham');?>
            <?php $funcLayout->setVarible($product);?>
            <?php $funcLayout->setType("product");?>
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