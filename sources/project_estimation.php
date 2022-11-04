<?php  
if(!defined('SOURCES')) die("Error");

$motaDutoan = $d->rawQueryOne("select mota$lang as mota from #_static where type = ? limit 0,1",array('mota-dutoan'));
$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));
$seo->setSeo('h1',$title_crumb);
if(!empty($seopage['title'.$seolang])) $seo->setSeo('title',$seopage['title'.$seolang]);
else $seo->setSeo('title',$title_crumb);
if(!empty($seopage['keywords'.$seolang])) $seo->setSeo('keywords',$seopage['keywords'.$seolang]);
if(!empty($seopage['description'.$seolang])) $seo->setSeo('description',$seopage['description'.$seolang]);
$seo->setSeo('url',$func->getPageURL());
$img_json_bar = (isset($seopage['options']) && $seopage['options'] != '') ? json_decode($seopage['options'],true) : null;
if(!empty($seopage['photo']))
{
	if($img_json_bar == null || ($img_json_bar['p'] != $seopage['photo']))
	{
		$img_json_bar = $func->getImgSize($seopage['photo'],UPLOAD_SEOPAGE_L.$seopage['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'seopage',$seopage['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_SEOPAGE_L.$seopage['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}
}
/* breadCrumbs */
if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
$dataEstimation = null;
var_dump($_GET['projectEstimation']);
if ($_GET['projectEstimation']==true) {
	$id_loaicongtrinh = empty($_GET['id_loaicongtrinh']) ? null : htmlspecialchars($_GET['id_loaicongtrinh']);
	$id_dichvuxaynha = empty($_GET['id_dichvuxaynha']) ? null : htmlspecialchars($_GET['id_dichvuxaynha']);
	$id_mucdautu = empty($_GET['id_mucdautu']) ? null : htmlspecialchars($_GET['id_mucdautu']);
	$id_mattien = empty($_GET['id_mattien']) ? null : htmlspecialchars($_GET['id_mattien']);
	$width = empty($_GET['width']) ? null : htmlspecialchars($_GET['width']);
	$longs = empty($_GET['longs']) ? null : htmlspecialchars($_GET['longs']);
	$floor = empty($_GET['floor']) ? null : htmlspecialchars($_GET['floor']);
	$id_hem = empty($_GET['id_hem']) ? null : htmlspecialchars($_GET['id_hem']);
	$mezzanine = empty($_GET['mezzanine']) ? null : htmlspecialchars($_GET['mezzanine']);
	$rooftop = empty($_GET['rooftop']) ? null : htmlspecialchars($_GET['rooftop']);
	$id_santhuong = empty($_GET['id_santhuong']) ? null : htmlspecialchars($_GET['id_santhuong']);
	$id_bancong = empty($_GET['id_bancong']) ? null : htmlspecialchars($_GET['id_bancong']);
	$id_loaimong = empty($_GET['id_loaimong']) ? null : htmlspecialchars($_GET['id_loaimong']);
	$id_tangham = empty($_GET['id_tangham']) ? null : htmlspecialchars($_GET['id_tangham']);
	$id_mai = empty($_GET['id_mai']) ? null : htmlspecialchars($_GET['id_mai']);
	$garden = empty($_GET['garden']) ? null : htmlspecialchars($_GET['garden']);

	$getLoaiCongTrinh = $d->rawQueryOne("select dientich,phantram,id from #_news where id = ?",array($id_loaicongtrinh));
}
?>