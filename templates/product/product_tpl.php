<?php include TEMPLATE.LAYOUT."nav_page.php"; ?>
<div class="container">
    <div class="box-filterProduct d-flex align-items-stretch justify-content-between flex-wrap">
        <div class="item__filter" style="width: <?=(100/count($filterList))?>%;">
            <span>Bộ lọc</span>
            <?php if (@$pro_list['id'] > 0 && @$idc > 0) {?>
                <a href="<?=$pro_cat['tenkhongdau'.$lang]?>" title="Close">✕</a>
            <?php }else if(@$idl > 0){?>
                <a href="<?=$pro_list['tenkhongdau'.$lang]?>" title="Close">✕</a>
            <?php } ?>
        </div>
        <?php var_dump($filterList); ?>
        <?php foreach ($filterList as $key => $value) {
            $filterItem = $d->rawQuery("select ten$lang as ten,tenkhongdau$lang as tenkhongdau,id from #_product where type = ? and id_list = ? and hienthi = 1 order by stt,id desc",array('filter-product',$value['id']));
            ?>
            <div class="item__filter" style="width: <?=(100/count($filterList))?>%;">
                <span><?=$value['ten']?></span>
                <ul>
                    <li class="filter-item" data-id="0">
                        <?=$value['ten']?>
                    </li>
                    <?php foreach ($filterItem as $keyItem => $valueItem) {?>
                        <li class="filter-item" data-id="<?=$valueItem['id']?>">
                            <?=$valueItem['ten']?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
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