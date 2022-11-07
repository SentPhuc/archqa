<?php
/* Check HTTP */
$func->checkHTTP($http,$config['arrayDomainSSL'],$config_base,$config_url);

/* Validate URL */
$func->checkUrl($config['website']['index']);

/* Check login */
$func->checkLogin();

/* Mobile detect */
$deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
($config['website']['mobile']) ? (($deviceType == 'mobile') ? @define ( 'TEMPLATE' , './templates_m/') : @define ( 'TEMPLATE' , './templates/')) : @define ( 'TEMPLATE' , './templates/');
@define ( 'LAYOUT' , TEMPLATE.'/layout/');

// /* Watermark */
// $wtmPro = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1",array('watermark','photo_static'));
// $wtmNews = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1",array('watermark-news','photo_static'));

/* Router */
$router->setBasePath($config['database']['url']);
$router->map('GET',array('admin/','admin'), function(){
	global $func, $config;
	$func->redirect($config['database']['url']."admin/index.php");
	exit;
});
$router->map('GET',array('admin','admin'), function(){
	global $func, $config;
	$func->redirect($config['database']['url']."admin/index.php");
	exit;
});
$router->map('GET|POST', '', 'index', 'home');
$router->map('GET|POST', 'index.php', 'index', 'index');
$router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
$router->map('GET|POST', '[a:com]', 'allpage', 'show');
// $router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
$router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
$router->map('GET', THUMBS.'/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
	global $func;
	$func->createThumb($w,$h,$z,$src,null,THUMBS);
},'thumb');
// $router->map('GET', WATERMARK.'/san-pham/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
// 	global $func, $wtmPro;
// 	$func->createThumb($w,$h,$z,$src,$wtmPro,"product");
// exit;
// },'watermark');
// $router->map('GET', WATERMARK.'/news/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
// 	global $func, $wtmNews;
// 	$func->createThumb($w,$h,$z,$src,$wtmNews,"news");
// exit;
// },'watermarkNews');
$match = $router->match();
if(is_array($match))
{
	if(is_callable($match['target']))
	{
		call_user_func_array($match['target'], $match['params']); 
	}
	else
	{
		$com = (isset($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
		$get_page = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
	}
}
else
{
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit;
}

/* Setting */
$sqlCache = "select * from #_setting";
$setting = $cache->getCache($sqlCache,'fetch',7200);
$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;

/* Lang */
if(isset($match['params']['lang']) && $match['params']['lang'] != '') $_SESSION['lang'] = $match['params']['lang'];
else if(!isset($_SESSION['lang']) && !isset($match['params']['lang'])) $_SESSION['lang'] = $optsetting['lang_default'];
$lang = $_SESSION['lang'];

/* Slug lang */
$sluglang = 'tenkhongdauvi';

/* SEO Lang */
$seolang = "vi";

/* Require datas */
require_once LIBRARIES."lang/lang$lang.php";

/* Tối ưu link */
$requick = array(
	/* Nhóm Sản phẩm */
	array("tbl"=>"product_list","field"=>"idl","source"=>"product","com"=>"product","type"=>"product"),
	array("tbl"=>"product_cat","field"=>"idc","source"=>"product","com"=>"product","type"=>"product"),
	array("tbl"=>"product","field"=>"id","source"=>"product","com"=>"product","type"=>"product",'menu'=>true),/*Product*/
	array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"quy-trinh-dat-hang","type"=>"quy-trinh-dat-hang",'menu'=>false),/* Quy trình đặt hàng */
	array("tbl"=>"tags","tbltag"=>"product","field"=>"id","source"=>"tags","com"=>"tags-product","type"=>"product",'menu'=>true),/* tags sản phẩm */

	/* Nhóm dự án */
	array("tbl"=>"project_list","field"=>"idl","source"=>"project","com"=>"project","type"=>"project"),
	array("tbl"=>"project","field"=>"id","source"=>"project","com"=>"project","type"=>"project",'menu'=>true),/*Project*/

	/* Nhóm Phẩm chất */
	array("tbl"=>"news_list","field"=>"idl","source"=>"news","com"=>"quality","type"=>"quality"),
	array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"quality","type"=>"quality",'menu'=>true),/*quality*/

	/* Nhóm Nguồn cảm hứng */
	array("tbl"=>"news_list","field"=>"idl","source"=>"news","com"=>"ideas-how-tos","type"=>"ideas-how-tos"),
	array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"ideas-how-tos","type"=>"ideas-how-tos",'menu'=>true),/*Ideas how tos*/
	array("tbl"=>"news_list","field"=>"idl","source"=>"news","com"=>"videos","type"=>"videos"),
	array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"videos","type"=>"videos",'menu'=>true),/*Videos*/

	/* Nhóm giới thiệu */
	array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"about","type"=>"about",'menu'=>true),/*About*/

	/* Dự toán công trình */
	array("tbl"=>"","field"=>"id","source"=>"","com"=>"du-toan-cong-trinh","type"=>"",'menu'=>true),

	/* Dowload catalog */
	array("tbl"=>"","field"=>"id","source"=>"","com"=>"dowload-catalog","type"=>"",'menu'=>true),

	/* Liên hệ */
	array("tbl"=>"","field"=>"id","source"=>"","com"=>"lien-he","type"=>"",'menu'=>true),
);

/* Find data */
if($com != 'tim-kiem' && $com != 'account' && $com != 'sitemap')
{
	foreach($requick as $k => $v)
	{
		$url_tbl = (isset($v['tbl']) && $v['tbl'] != '') ? $v['tbl'] : '';
		$url_tbltag = (isset($v['tbltag']) && $v['tbltag'] != '') ? $v['tbltag'] : '';
		$url_type = (isset($v['type']) && $v['type'] != '') ? $v['type'] : '';
		$url_field = (isset($v['field']) && $v['field'] != '') ? $v['field'] : '';
		$url_com = (isset($v['com']) && $v['com'] != '') ? $v['com'] : '';

		if($url_tbl!='' && $url_tbl!='static' && $url_tbl!='photo')
		{
			$row = $d->rawQueryOne("select id from #_$url_tbl where $sluglang = ? and type = ? and hienthi > 0 limit 0,1",array($com,$url_type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$_GET[$url_field] = $row['id'];
				$com = $url_com;
				break;
			}
		}
	}
}

/* Switch coms */
switch($com)
{

	case 'bao-gia':
	$source = "form_getquote";
	break;

	case 'du-toan-cong-trinh':
	$source = "project_estimation";
	$template = "static/project_estimation";
	$type = $com;
	$seo->setSeo('type','object');
	$title_crumb = 'Dự toán công trình';
	break;

	case 'contact':
	$source = "contact";
	$type = $com;
	$template = "static/contact";
	$seo->setSeo('type','object');
	$title_crumb = lienhe;
	break;

	case 'dowload-catalog':
	$source = "static";
	$type = $com;
	$template = "static/dowload_catalog";
	$seo->setSeo('type','object');
	$title_crumb = 'Dowload Catalog';
	break;

	case 'quality':
	$source = "news";
	$type = $com;
	$template = "news/quality";
	$seo->setSeo('type','object');
	$title_crumb = 'Chất lượng';
	break;

	case 'about':
	$source = "news";
	$template = "news/about_detail";
	$type = $com;
	$seo->setSeo('type','article');
	$title_crumb = gioithieu;
	break;

	case 'ideas-how-tos':
	$source = "news";
	$template = isset($_GET['id']) ? "news/ideas_detail" : "news/ideas";
	$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
	$type = $com;
	$title_crumb = 'Ý tưởng cách làm';
	break;

	case 'project':
	$source = "product";
	$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
	$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
	$type = $com;
	$title_crumb = 'Dự án';
	break;

	case 'product':
	$source = "product";
	$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
	$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
	$type = $com;
	$title_crumb = sanpham;
	break;

	case 'tim-kiem':
	$source = "product";
	$template = "product/product";
	$seo->setSeo('type','object');
	$title_crumb = timkiem;
	$type = "san-pham";
	break;

	case 'tags-product':
	$source = "tags";
	$template = "product/product";
	$type = $url_type;
	$table = $url_tbltag;
	$seo->setSeo('type','object');
	$title_crumb = null;
	break;

	case 'videos':
	$source = "news";
	$template = "static/videos";
	$type = $com;
	$seo->setSeo('type','object');
	$title_crumb = "Video";
	break;

	case 'account':
	$source = "user";
	$type = $source;
	break;

	case 'quy-trinh-dat-hang':
	$source = "news";
	$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
	$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
	$type = $com;
	$title_crumb = 'Quy trình đặt hàng';
	break;

	case 'ngon-ngu':
	if(isset($lang))
	{
		switch($lang)
		{
			case 'vi':
			$_SESSION['lang'] = 'vi';
			break;
			case 'en':
			$_SESSION['lang'] = 'en';
			break;
			default:
			$_SESSION['lang'] = 'vi';
			break;
		}
	}
	$func->redirect($_SERVER['HTTP_REFERER']);
	break;

	case 'sitemap':
	include_once LIBRARIES."sitemap.php";
	exit();

	case '':
	case 'index':
	$source = "index";
	$template ="index/index";
	$seo->setSeo('type','website');
	break;

	default: 
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit();
}

/* Include sources */
require_once SOURCES."allpage.php";
if($source!='') include SOURCES.$source.".php";
if($template=='')
{
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit();
}

if($setting['keyweb']==1)
{
	header('HTTP/1.0 404 Not Found', true, 404);
	include("coming.php");
	exit();
}
?>