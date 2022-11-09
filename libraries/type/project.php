<?php

/* Config type - Project */
/* Dự án */
$nametype = "project";
$config['project'][$nametype]['title_main'] = "Dự án";
$config['project'][$nametype]['dropdown'] = true;
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
	$config['project'][$nametype][$value] = true;
}
$config['project'][$nametype]['view'] = true;
$config['project'][$nametype]['copy'] = true;
$config['project'][$nametype]['copy_image'] = true;
$config['project'][$nametype]['slug'] = true;
$config['project'][$nametype]['check'] = array("noibat" => "Nổi bật");
$config['project'][$nametype]['images'] = true;
$config['project'][$nametype]['show_images'] = true;
$config['project'][$nametype]['gallery'] = array
(
	$nametype => array
	(
		"title_main_photo" => "Hình ảnh Dự án",
		"title_sub_photo" => "Hình ảnh",
		"number_photo" => 3,
		"images_photo" => true,
		"cart_photo" => false,
		"avatar_photo" => true,
		"tieude_photo" => true,
		"width_photo" => 540,
		"height_photo" => 540,
		"thumb_photo" => '100x100x1',
		"img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
	)
);
$config['project'][$nametype]['ma'] = true;
$config['project'][$nametype]['address'] = true;
$config['project'][$nametype]['year'] = true;
$config['project'][$nametype]['units'] = true;
$config['project'][$nametype]['filter'] = true;
$config['project'][$nametype]['mota'] = true;
$config['project'][$nametype]['mota_cke'] = true;
$config['project'][$nametype]['noidung'] = true;
$config['project'][$nametype]['noidung_cke'] = true;
$config['project'][$nametype]['chatluongcao'] = true;
$config['project'][$nametype]['chatluongcao_cke'] = true;
$config['project'][$nametype]['chuoicungungtoancau'] = true;
$config['project'][$nametype]['chuoicungungtoancau_cke'] = true;
$config['project'][$nametype]['seo'] = true;
$config['project'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['project'][$nametype]['thumb'] = '100x100x1';
$config['project'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
	$config["project"][$nametype]["title_main_$value"] = "Dự án cấp ".($key+1);
	$config["project"][$nametype]["images_$value"] = true;
	$config["project"][$nametype]["show_images_$value"] = true;
	$config["project"][$nametype]["slug_$value"] = true;
	$config["project"][$nametype]["check_$value"] = array();
	$config["project"][$nametype]["show_gallery_$value"] = false;
	$config["project"][$nametype]["gallery_$value"] = array();
	$config["project"][$nametype]["mota_$value"] = true;
	$config["project"][$nametype]["seo_$value"] = true;
	$config["project"][$nametype]["size_images_$value"] = '1920x470';
	$config["project"][$nametype]["thumb_$value"] = '100x100x1';
	$config["project"][$nametype]["img_type_$value"] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
}

/* filter */
$nametype = "filter-vitri-project";
$config['project'][$nametype]['title_main'] = "Filter vị trí dự án";
$config['project'][$nametype]['check'] = array();
$config['project'][$nametype]['gallery'] = array();

/* filter */
$nametype = "filter-kieu-project";
$config['project'][$nametype]['title_main'] = "Filter kiểu dự án";
$config['project'][$nametype]['check'] = array();
$config['project'][$nametype]['gallery'] = array();