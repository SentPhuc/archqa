<?php 
include "ajax_config.php";

/* Paginations */
include LIBRARIES."class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$type = (isset($_GET['type']) && $_GET['type'] !="") ? htmlspecialchars($_GET['type']) : "";
$idList = (isset($_GET['idList']) && $_GET['idList'] > 0) ? htmlspecialchars($_GET['idList']) : 0;

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p-1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_product.php?perpage=".$pagingAjax->perpage;
if (!empty($type)) {
	$pageLink .= "&type=".$type;
}
$tempLink = "";
$where = "";

/* Math url */
if($idList)
{
	$tempLink .= "&idList=".$idList;
	$where .= " and id_list = ".$idList;
}
$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select ten$lang as ten, tenkhongdau$lang as tenkhongdau, id, photo, gia, giamoi, giakm, type from #_product where type='".$type."' $where and noibat > 0 and hienthi > 0 order by stt,id desc";
$sqlCache = $sql." limit $start, $pagingAjax->perpage";
$product = $cache->getCache($sqlCache,'result',7200);

/* Count all data */
$countItems = count($cache->getCache($sql,'result',7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if($countItems) { ?>
	<div class="row__item">
		<?php $funcLayout->setTbl('product'); ?>
		<?php $funcLayout->setClass('item__product item'); ?>
		<?php $funcLayout->setHvr('scale-img'); ?>
		<?php $funcLayout->infoTheme('san-pham');?>
		<?php $funcLayout->setVarible($product); ?>
		<?php $funcLayout->setType('product'); ?>
		<?php $funcLayout->setImage($config['theme'][$type]['dir'], $config['theme'][$type]['column'], $config['theme'][$type]['size']); ?>
		<?php $funcLayout->getTheme(); ?>
	</div>
	<div class="pagination-ajax"><?=$pagingItems?></div>
<?php } ?>