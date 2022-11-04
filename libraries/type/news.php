<?php
/* Config type - News */
/* Giới thiệu */
$nametype = "about";
$config['news'][$nametype]['title_main'] = "Giới thiệu";
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['check'] = array('menu'=>'Show menu nguồn cảm hứng','menu1'=>'Show menu phẩm chất');
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['mota'] = false;
$config['news'][$nametype]['noidung'] = true;
$config['news'][$nametype]['noidung_cke'] = true;
$config['news'][$nametype]['seo'] = true;
$config['news'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Quy trình đặt hàng */
$nametype = "quy-trinh-dat-hang";
$config['news'][$nametype]['title_main'] = "Quy trình đặt hàng";
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['images1'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['mota'] = false;
$config['news'][$nametype]['noidung'] = true;
$config['news'][$nametype]['noidung_cke'] = true;
$config['news'][$nametype]['seo'] = true;
$config['news'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['news'][$nametype]['size_images1'] = '22x22';
$config['news'][$nametype]['thumb'] = '35x35x2';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Mô tả dự án */
$nametype = "news-project";
$config['news'][$nametype]['title_main'] = "Mô tả dự án";
$config['news'][$nametype]['theme'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['mota'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
$config['news'][$nametype]['gallery'] = array(
    $nametype => array
    (
        "title_main_photo" => "Hình ảnh News dự án",
        "title_sub_photo" => "Hình ảnh",
        "number_photo" => 3,
        "images_photo" => true,
        "avatar_photo" => true,
        "tieude_photo" => true,
        "width_photo" => 635,
        "height_photo" => 660,
        "thumb_photo" => '100x100x1',
        "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
    ),
    "thongke" => array
    (
        "title_main_photo" => "Thống kê News dự án",
        "title_sub_photo" => "Thống kê",
        "number_photo" => 4,
        "value_photo" => true,
        "tieude_photo" => true
    ),
);

/* Dịch vụ chuyên nghiệp */
$nametype = "dich-vu-chuyen-nghiep";
$config['news'][$nametype]['title_main'] = "Dịch vụ chuyên nghiệp";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['mota'] = true;
$config['news'][$nametype]['size_images'] = '635x800';
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Vì sao chọn chúng tôi */
$nametype = "vi-sao-chon-chung-toi";
$config['news'][$nametype]['title_main'] = "Vì sao chọn chúng tôi";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['mota'] = true;
$config['news'][$nametype]['mota_cke'] = true;
$config['news'][$nametype]['size_images'] = '68x68';
$config['news'][$nametype]['thumb'] = '68x68x2';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Cảm nhận khách hàng */
$nametype = "cam-nhanh-khach-hang";
$config['news'][$nametype]['title_main'] = "Cảm nhận khách hàng";
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['mota'] = true;

/* Video */
$nametype = "videos";
$config['news'][$nametype]['title_main'] = "Video";
$config['news'][$nametype]['dropdown'] = true;
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config['news'][$nametype][$value] = true;
}
$config['news'][$nametype]['video'] = true;
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['slug'] = false;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Video danh mục */
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config["news"][$nametype]["title_main_$value"] = "Video cấp ".($key+1);
    $config["news"][$nametype]["images_$value"] = false;
    $config["news"][$nametype]["show_images_$value"] = false;
    $config["news"][$nametype]["slug_$value"] = true;
    $config["news"][$nametype]["check_$value"] = array();
    $config["news"][$nametype]["show_gallery_$value"] = false;
    $config["news"][$nametype]["gallery_$value"] = array();
    $config["news"][$nametype]["mota_$value"] = false;
    $config["news"][$nametype]["mota_cke_$value"] = false;
    $config["news"][$nametype]["noidung_$value"] = false;
    $config["news"][$nametype]["noidung_cke_$value"] = false;
    $config["news"][$nametype]["seo_$value"] = true;
    $config["news"][$nametype]["size_images_$value"] = '320x240';
    $config["news"][$nametype]["thumb_$value"] = '100x100x1';
    $config["news"][$nametype]["img_type_$value"] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
}

/* Phẩm chất */
$nametype = "quality";
$config['news'][$nametype]['title_main'] = "Phẩm chất";
$config['news'][$nametype]['dropdown'] = true;
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config['news'][$nametype][$value] = true;
}
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array
(
    $nametype => array
    (
        "title_main_photo" => "Hình ảnh Phẩm chất",
        "title_sub_photo" => "Hình ảnh",
        "number_photo" => 3,
        "images_photo" => true,
        "avatar_photo" => true,
        "tieude_photo" => true,
        "width_photo" => 400,
        "height_photo" => 440,
        "thumb_photo" => '100x100x1',
        "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
    )
);
$config['news'][$nametype]['mota'] = true;
$config['news'][$nametype]['mota_cke'] = true;
$config['news'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Phẩm chất danh mục */
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config["news"][$nametype]["title_main_$value"] = "Phẩm chất cấp ".($key+1);
    $config["news"][$nametype]["images_$value"] = true;
    $config["news"][$nametype]["show_images_$value"] = true;
    $config["news"][$nametype]["slug_$value"] = true;
    $config["news"][$nametype]["check_$value"] = array('footer' => 'Footer');
    $config["news"][$nametype]["show_gallery_$value"] = false;
    $config["news"][$nametype]["gallery_$value"] = array();
    $config["news"][$nametype]["mota_$value"] = true;
    $config["news"][$nametype]["noidung_$value"] = true;
    $config["news"][$nametype]["seo_$value"] = true;
    $config["news"][$nametype]["size_images_$value"] = '1366x470';
    $config["news"][$nametype]["thumb_$value"] = '100x100x1';
    $config["news"][$nametype]["img_type_$value"] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
}

/* Ý tưởng cách làm */
$nametype = "ideas-how-tos";
$config['news'][$nametype]['title_main'] = "Ý tưởng cách làm";
$config['news'][$nametype]['dropdown'] = true;
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config['news'][$nametype][$value] = true;
}
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['tieude_category'] = true;
$config['news'][$nametype]['mota'] = true;
$config['news'][$nametype]['noidung'] = true;
$config['news'][$nametype]['noidung_cke'] = true;
$config['news'][$nametype]['size_images'] = $config['theme'][$nametype]['size'];
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Ý tưởng cách làm danh mục */
foreach ($config['theme'][$nametype]['lv'] as $key => $value) {
    $config["news"][$nametype]["title_main_$value"] = "Ý tưởng cách làm cấp ".($key+1);
    $config["news"][$nametype]["images1_$value"] = true;
    $config["news"][$nametype]["images_$value"] = true;
    $config["news"][$nametype]["show_images_$value"] = true;
    $config["news"][$nametype]["slug_$value"] = true;
    $config["news"][$nametype]["check_$value"] = array();
    $config["news"][$nametype]["show_gallery_$value"] = false;
    $config["news"][$nametype]["gallery_$value"] = array();
    $config["news"][$nametype]["mota_$value"] = true;
    $config["news"][$nametype]["seo_$value"] = true;
    $config["news"][$nametype]["size_images_$value"] = '1366x470';
    $config["news"][$nametype]["size_images1_$value"] = '24x24';
    $config["news"][$nametype]["thumb_$value"] = '100x100x1';
    $config["news"][$nametype]["img_type_$value"] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
}

/* Đơn giá */
$nametype = "dongia";
$config['news'][$nametype]['title_main'] = "Đơn giá";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['chondieukien'] = true;
$config['news'][$nametype]['gia'] = true;

/* Loại công trình */
$nametype = "loaicongtrinh";
$config['news'][$nametype]['title_main'] = "Loại công trình";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dientich'] = true;
$config['news'][$nametype]['phantram_dongia'] = true;

/* Dịch vụ xây nhà */
$nametype = "dichvuxaynha";
$config['news'][$nametype]['title_main'] = "Dịch vụ xây nhà";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;

/* Mức đầu tư */
$nametype = "mucdautu";
$config['news'][$nametype]['title_main'] = "Mức đầu tư";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;

/* Mặt tiền */
$nametype = "mattien";
$config['news'][$nametype]['title_main'] = "Mặt tiền";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;

/* Độ rộng hẻm */
$nametype = "hem";
$config['news'][$nametype]['title_main'] = "Độ rộng hẻm";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['phantram_dongia'] = true;

/* Loại sân thượng */
$nametype = "santhuong";
$config['news'][$nametype]['title_main'] = "Loại sân thượng";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['phantram_dongia'] = true;

/* Ban công */
$nametype = "bancong";
$config['news'][$nametype]['title_main'] = "Ban công";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;
$config['news'][$nametype]['phantram_dongia'] = true;

/* Loại móng */
$nametype = "loaimong";
$config['news'][$nametype]['title_main'] = "Loại móng";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;
$config['news'][$nametype]['phantram_dongia'] = true;

/* Độ sâu tầng hầm */
$nametype = "tangham";
$config['news'][$nametype]['title_main'] = "Độ sâu tầng hầm";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;
$config['news'][$nametype]['phantram_dongia'] = true;

/* Loại mái */
$nametype = "mai";
$config['news'][$nametype]['title_main'] = "Loại mái";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['check'] = array();
$config['news'][$nametype]['gallery'] = array();
$config['news'][$nametype]['dongia'] = true;
$config['news'][$nametype]['phantram_dongia'] = true;