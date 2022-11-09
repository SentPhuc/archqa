<?php
/* Config type - Product */
/* Sản phẩm */
$nametype = "product";
$config['product'][$nametype]['title_main'] = "Sản phẩm";
$config['product'][$nametype]['dropdown'] = true;
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
   $config['product'][$nametype][$value] = true;
}
$config['product'][$nametype]['filter'] = true;
$config['product'][$nametype]['brand'] = false;
$config['product'][$nametype]['mau'] = false;
$config['product'][$nametype]['size'] = false;
$config['product'][$nametype]['tags'] = true;
$config['product'][$nametype]['import'] = false;
$config['product'][$nametype]['export'] = false;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['copy'] = true;
$config['product'][$nametype]['copy_image'] = true;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = array
(
    $nametype => array
    (
        "title_main_photo" => "Hình ảnh Sản phẩm",
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
$config['product'][$nametype]['ma'] = true;
$config['product'][$nametype]['gia'] = false;
$config['product'][$nametype]['giamoi'] = false;
$config['product'][$nametype]['giakm'] = false;
$config['product'][$nametype]['mota'] = false;
$config['product'][$nametype]['mota_cke'] = false;
$config['product'][$nametype]['noidung'] = true;
$config['product'][$nametype]['noidung_cke'] = true;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['product'][$nametype]['thumb'] = '100x100x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config["product"][$nametype]["title_main_$value"] = "Sản phẩm cấp ".($key+1);
    $config["product"][$nametype]["images_$value"] = false;
    $config["product"][$nametype]["show_images_$value"] = false;
    $config["product"][$nametype]["slug_$value"] = true;
    $config["product"][$nametype]["check_$value"] = array();
    $config["product"][$nametype]["mota_$value"] = false;

    if ($key==0) {
        $config["product"][$nametype]["filter_$value"] = true;
        $config["product"][$nametype]["mota_$value"] = true;
        $config["product"][$nametype]["mota_cke_$value"] = true;
        $config["product"][$nametype]["noidung_$value"] = true;
        $config["product"][$nametype]["noidung_cke_$value"] = true;
        $config["product"][$nametype]["check_$value"] = array("noibat" => "Nổi bật","footer" => "Footer","cat" => "Show cat In");
        $config["product"][$nametype]["titlesub_$value"] = true;
        $config["product"][$nametype]["images_$value"] = true;
        $config["product"][$nametype]["show_images_$value"] = true;
        $config["product"][$nametype]["size_images_$value"] = '1010x600';
        $config["product"][$nametype]["thumb_$value"] = '100x100x1';
        $config["product"][$nametype]["images1_$value"] = true;
        $config["product"][$nametype]["size_images1_$value"] = '25x25';
        $config["product"][$nametype]["images2_$value"] = true;
        $config["product"][$nametype]["size_images2_$value"] = '1920x470';
        $config["product"][$nametype]["images3_$value"] = false;
        $config["product"][$nametype]["size_images3_$value"] = '1300x300';
    }
    $config["product"][$nametype]["show_gallery_$value"] = true;
    $config["product"][$nametype]["gallery_$value"] = array
    (
        "tuy-chinh" => array
        (
            "title_main_photo" => "Tùy chỉnh cấp 1",
            "title_sub_photo" => "Tùy chỉnh",
            "number_photo" => 3,
            "video_photo" => false,
            "mota_photo" => true,
            "tieude_photo" => true
        )
    );
    $config["product"][$nametype]["seo_$value"] = true;
    $config["product"][$nametype]["img_type_$value"] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
}

foreach ($func->isArrayFilter() as $key => $value) {
    /* Filter Theo phong cách */
    $config['product'][$func->isArrayFilter('type')[$key]]['title_main'] = $value;
    $config['product'][$func->isArrayFilter('type')[$key]]['list'] = true;
    $config['product'][$func->isArrayFilter('type')[$key]]['check'] = array();
    $config['product'][$func->isArrayFilter('type')[$key]]['gallery'] = array();
}
