<?php

/* Config type - Group */

$arrGroupProductInProduct = array("product");
if (!empty($func->isArrayFilter('type'))) {
    foreach ($func->isArrayFilter('type') as $value) {
        array_push($arrGroupProductInProduct,$value);
    }
}
$config['group'] = array(
    "Group sản phẩm" => array(
        "product" => $arrGroupProductInProduct,
        "tags" => array("product"),
        "news" => array("quy-trinh-dat-hang"),
        "photo_static" => array("banner-san-pham"),
    ),
    "Group dự án" => array(
        "project" => array("project","filter-vitri-project","filter-kieu-project"),
        "news" => array("news-project","dich-vu-chuyen-nghiep"),
        "static" => array("mota-project"),
        "photo_static" => array("banner-project","banner-contact-project"),
    ),
    "Group phẩm chất" => array(
        "news" => array("quality"),
        "photo_static" => array("banner-quality"),
        "static" => array("mota-quality"),
        "photo" => array("news-quality","nhacungcap"),
    ),
    "Group nguồn cảm hứng" => array(
        "news" => array("ideas-how-tos","videos"),
        "photo_static" => array("banner-ideas-how-tos","banner-videos"),
    ),
    "Group giới thiệu" => array(
        "news" => array("about"),
        "static" => array("goi-cho-chung-toi"),
        "photo_static" => array("banner-about"),
    ),
    "Group Dư toán công trình" => array(
        "news" => array("dongia","loaicongtrinh","dichvuxaynha","mucdautu","mattien","hem","santhuong","bancong","loaimong","tangham","mai"),
        "static" => array("mota-dutoan","detail-dutoan"),
    )
);