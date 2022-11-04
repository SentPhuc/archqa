<?php
if(!defined('LIBRARIES')) die("Error");

/* Root */
define('ROOT',__DIR__);

/* Timezone */
date_default_timezone_set('Asia/Ho_Chi_Minh');

/* Cấu hình upload */
require_once LIBRARIES."constant.php";
$port = null;
if ($_SERVER['SERVER_PORT']) {
	$port = ($_SERVER['SERVER_PORT']) ? ':'.$_SERVER['SERVER_PORT'] : "";
}
/* Cấu hình chung */
$config = array(
	'arrayDomainSSL' => array(),
	'database' => array(
		'server-name' => $_SERVER["SERVER_NAME"].$port,
		'url' => '/Archqa/',
		'type' => 'mysql',
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'Archqa',
		'port' => 3306,
		'prefix' => 'table_',
		'charset' => 'utf8'
	),
	'website' => array(
		'mobile' => false,
		'responsive' => true,
		'error-reporting' => true,
		'secret' => '$secret@',
		'salt' => 'salt',
		'debug-developer' => false,
		'debug-css' => true,
		'debug-js' => true,
		'index' => false,
		'upload' => array(
			'max-width' => 1600,
			'max-height' => 1600
		),
		'lang' => array(
			'vi'=>'Tiếng Việt'
		),
		'lang-doc' => 'vi',
		'slug' => array(
			'vi'=>'Tiếng Việt'
		),
		'seo' => array(
			'vi'=>'Tiếng Việt'
		),
		'comlang' => array()
	),
	'order' => array(
		'ship' => false,
		'cart' => false
	),
	'login' => array(
		'admin' => 'LoginAdmin',
		'member' => 'LoginMember',
		'attempt' => 5,
		'delay' => 15
	),
	'googleAPI' => array(
		'recaptcha' => array(
			'active' => false,
			'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
			'sitekey' => '6LezS5kUAAAAAF2A6ICaSvm7R5M-BUAcVOgJT_31',
			'secretkey' => '6LezS5kUAAAAAGCGtfV7C1DyiqlPFFuxvacuJfdq'
		)
	),'theme' => array(
		'product' => array('tbl' => 'product','dir' => UPLOAD_PRODUCT_L,'column' => 'photo','size' => THUMBS.'/425x300x1','lv' => array('list','cat')),
		'project' => array('tbl' => 'project','dir' => UPLOAD_PRODUCT_L,'column' => 'photo','size' => THUMBS.'/425x300x1','lv' => array('list')),
		'quy-trinh-dat-hang' => array('tbl' => 'news','dir' => UPLOAD_NEWS_L,'column' => 'photo','size' => THUMBS.'/36x36x1','lv' => array()),
		'about' => array('tbl' => 'news','dir' => UPLOAD_NEWS_L,'column' => 'photo','size' => THUMBS.'/305x288x1','lv' => array()),
		'videos' => array('tbl' => 'news','dir' => UPLOAD_NEWS_L,'column' => 'photo','size' => THUMBS.'/406x306x1','lv' => array('list')),
		'quality' => array('tbl' => 'news','dir' => UPLOAD_NEWS_L,'column' => 'photo','size' => THUMBS.'/400x440x1','lv' => array('list')),
		'ideas-how-tos' => array('tbl' => 'news','dir' => UPLOAD_NEWS_L,'column' => 'photo','size' => THUMBS.'/635x310x1','lv' => array('list')),
	)
);

/* Error reporting */
error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

/* Cấu hình base */
$http = 'http://';
$config_url = $config['database']['server-name'].$config['database']['url'];
$config_base = $http.$config_url;

/* Cấu hình login */
$login_admin = $config['login']['admin'];
$login_member = $config['login']['member'];
?>