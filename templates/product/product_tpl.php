<?php include TEMPLATE.LAYOUT."nav_page.php"; ?>
<div class="box-product">
    <div class="container">
        <?php if ($com!='tim-kiem') {?>
            <div class="box-filterProduct d-flex align-items-stretch justify-content-between flex-wrap">
                <div class="item__filter" style="width: <?=(100/(count($filterList) + 1))?>%;">
                    <span>Bộ lọc (<?=$total?>)</span>
                    <?php if (@$pro_list['id'] > 0 && @$idc > 0) {?>
                        <a href="<?=$pro_cat['tenkhongdau'.$lang]?>" title="Close">✕</a>
                    <?php }else if(@$idl > 0){?>
                        <a href="<?=$pro_list['tenkhongdau'.$lang]?>" title="Close">✕</a>
                    <?php } ?>
                </div>
                <?php if (!empty($filterList)) {?>
                    <?php foreach ($filterList as $key => $value) {
                        $filterItem = null;
                        $getIsArrayFilterType = $func->isArrayFilter('type');
                        if (!empty($value)) {
                            $filterItem = $d->rawQuery("select ten$lang as ten,tenkhongdau$lang as tenkhongdau,id from #_product where type = ? and hienthi = 1 order by stt,id desc",array($getIsArrayFilterType[$value]));
                        }
                        $idcActive = !empty($_GET[$value]) ? $_GET[$value] : 0;
                        $title_cat .= ($idcActive) ? ' - '.$func->setTitleFilter($idcActive,$value,true) : '';
                        ?>
                        <div class="item__filter" style="width: <?=(100/(count($filterList) + 1))?>%;">
                            <span class="views-menuFilter"><?=$func->setTitleFilter($idcActive,$value)?></span>
                            <ul>
                                <li class="filter-item" data-id="0" data-type="cat" data-key="<?=$value?>">
                                    <?=$func->setTitleFilter(0,$value)?>
                                </li>
                                <?php foreach ($filterItem as $keyItem => $valueItem) {?>
                                    <li class="filter-item" data-id="<?=$valueItem['id']?>" data-type="cat" data-key="<?=$value?>">
                                        <?=$valueItem['ten']?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="header-product d-flex align-items-center justify-content-between flex-wrap">
                <span class="title"><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span>
                <div class="info d-flex align-items-center justify-content-between">
                    <div class="sort-product">
                        <span>
                            Sắp xếp theo:
                        </span>
                        <span class="item-sort-product filter-item <?=(@$_GET['sort'] == 'date') ? 'active':''?>" data-id="0" data-key="date" data-type="sort">
                            Thời gian
                        </span>
                        <span class="item-sort-product filter-item <?=(@$_GET['sort'] == 'like') ? 'active':''?>" data-id="0" data-key="like" data-type="sort">
                            Thích
                        </span>
                    </div>
                    <div class="search-product d-flex align-items-center justify-content-between">
                        <input value="<?=@$_GET['keyword']?>" type="text" name="keywordProuct" id="keywordProuct" placeholder="Tìm kiếm sản phẩm ..." onkeypress="doEnter(event,'keywordProuct','product');"/>
                        <p class="transition" onclick="onSearch('keywordProuct','product');"><i class="fa fa-search"></i></p>
                    </div>
                </div>
            </div>
            <?php foreach ($func->isArrayFilter('key') as $value) {?>
                <input type="hidden" value="<?=!empty($_GET[$value]) ? $_GET[$value] : 0?>" id="<?=$value?>">
            <?php } ?>
        <?php } ?>
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
            <div class="alert alert-warning mt-3" role="alert">
                <strong><?=khongtimthayketqua?></strong>
            </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
    </div>
</div>