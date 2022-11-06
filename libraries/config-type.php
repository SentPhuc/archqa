<?php
/* Cấu hình group */
require_once LIBRARIES."type/group.php";

/* Cấu hình product */
require_once LIBRARIES."type/product.php";

/* Cấu hình Project */
require_once LIBRARIES."type/project.php";

/* Cấu hình News */
require_once LIBRARIES."type/news.php";

/* Cấu hình Photo */
require_once LIBRARIES."type/photo.php";

/* Config type - Tags */
/* Tags sản phẩm */
$nametype = "product";
$config['tags'][$nametype]['title_main'] = "Tags sản phẩm";
$config['tags'][$nametype]['slug'] = true;
$config['tags'][$nametype]['images'] = false;
$config['tags'][$nametype]['show_images'] = false;
$config['tags'][$nametype]['check'] = array();
$config['tags'][$nametype]['seo'] = true;
$config['tags'][$nametype]['size_images'] = '100x100';
$config['tags'][$nametype]['thumb'] = '100x100x1';
$config['tags'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Config type - Newsletter */
/* Báo giá miễn phí */
$nametype = "baogiamienphi";
$config['newsletter'][$nametype]['title_main'] = "Báo giá miễn phí";
$config['newsletter'][$nametype]['source'] = true;
$config['newsletter'][$nametype]['qty'] = true;
$config['newsletter'][$nametype]['product'] = true;
$config['newsletter'][$nametype]['city'] = true;
$config['newsletter'][$nametype]['file'] = true;
$config['newsletter'][$nametype]['email'] = true;
$config['newsletter'][$nametype]['guiemail'] = true;
$config['newsletter'][$nametype]['ten'] = true;
$config['newsletter'][$nametype]['dienthoai'] = true;
$config['newsletter'][$nametype]['diachi'] = true;
$config['newsletter'][$nametype]['chude'] = false;
$config['newsletter'][$nametype]['noidung'] = true;
$config['newsletter'][$nametype]['ghichu'] = false;
$config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Đã xem", "2" => "Đã liên hệ", "3" => "Đã thông báo");
$config['newsletter'][$nametype]['showten'] = true;
$config['newsletter'][$nametype]['showdienthoai'] = true;
$config['newsletter'][$nametype]['showngaytao'] = true;
$config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

/* Dowload catalog */
$nametype = "dowload-catalog";
$config['newsletter'][$nametype]['title_main'] = "Dowload catalog";
$config['newsletter'][$nametype]['source'] = false;
$config['newsletter'][$nametype]['qty'] = true;
$config['newsletter'][$nametype]['product'] = true;
$config['newsletter'][$nametype]['city'] = true;
$config['newsletter'][$nametype]['district'] = true;
$config['newsletter'][$nametype]['file'] = true;
$config['newsletter'][$nametype]['email'] = true;
$config['newsletter'][$nametype]['guiemail'] = true;
$config['newsletter'][$nametype]['ten'] = true;
$config['newsletter'][$nametype]['dienthoai'] = true;
$config['newsletter'][$nametype]['diachi'] = false;
$config['newsletter'][$nametype]['chude'] = false;
$config['newsletter'][$nametype]['noidung'] = true;
$config['newsletter'][$nametype]['ghichu'] = false;
$config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Đã xem", "2" => "Đã liên hệ", "3" => "Đã thông báo");
$config['newsletter'][$nametype]['showten'] = true;
$config['newsletter'][$nametype]['showdienthoai'] = true;
$config['newsletter'][$nametype]['showngaytao'] = true;
$config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

/* Yêu cầu sản phẩm */
$nametype = "yeucausanpham";
$config['newsletter'][$nametype]['title_main'] = "Yêu cầu sản phẩm";
$config['newsletter'][$nametype]['source'] = false;
$config['newsletter'][$nametype]['qty'] = true;
$config['newsletter'][$nametype]['product'] = true;
$config['newsletter'][$nametype]['city'] = false;
$config['newsletter'][$nametype]['district'] = false;
$config['newsletter'][$nametype]['file'] = true;
$config['newsletter'][$nametype]['email'] = true;
$config['newsletter'][$nametype]['guiemail'] = true;
$config['newsletter'][$nametype]['ten'] = true;
$config['newsletter'][$nametype]['dienthoai'] = true;
$config['newsletter'][$nametype]['diachi'] = true;
$config['newsletter'][$nametype]['chude'] = false;
$config['newsletter'][$nametype]['noidung'] = true;
$config['newsletter'][$nametype]['ghichu'] = false;
$config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Đã xem", "2" => "Đã liên hệ", "3" => "Đã thông báo");
$config['newsletter'][$nametype]['showten'] = true;
$config['newsletter'][$nametype]['showdienthoai'] = true;
$config['newsletter'][$nametype]['showngaytao'] = true;
$config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

/* Đăng ký nhận tin */
$nametype = "dangkynhantin";
$config['newsletter'][$nametype]['title_main'] = "Đăng ký nhận tin";
$config['newsletter'][$nametype]['email'] = true;
$config['newsletter'][$nametype]['guiemail'] = true;
$config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Đã xem", "2" => "Đã liên hệ", "3" => "Đã thông báo");
$config['newsletter'][$nametype]['showngaytao'] = true;
$config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

/* Config type - Static */
/* Câu hỏi thường gặp */
$nametype = "cau-hoi-thuong-gap";
$config['static'][$nametype]['title_main'] = "Câu hỏi thường gặp";
$config['static'][$nametype]['images'] = true;
$config['static'][$nametype]['tieude'] = true;
$config['static'][$nametype]['noidung'] = true;
$config['static'][$nametype]['noidung_cke'] = true;
$config['static'][$nametype]['seo'] = true;
$config["static"][$nametype]["size_images"] = '300x200';
$config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
$config['static'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

/* Gọi cho chúng tôi */
$nametype = "goi-cho-chung-toi";
$config['static'][$nametype]['title_main'] = "Gọi cho chúng tôi";
$config['static'][$nametype]['noidung'] = true;
$config['static'][$nametype]['noidung_cke'] = true;

/* Mô tả dự án */
$nametype = "mota-project";
$config['static'][$nametype]['title_main'] = "Mô tả dự án";
$config['static'][$nametype]['tieude'] = true;
$config['static'][$nametype]['mota'] = true;

/* Mô tả phẩm chất */
$nametype = "mota-quality";
$config['static'][$nametype]['title_main'] = "Mô tả phẩm chất";
$config['static'][$nametype]['tieude'] = true;
$config['static'][$nametype]['mota'] = true;
$config['static'][$nametype]['images'] = true;
$config["static"][$nametype]["size_images"] = '400x440';
$config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
$config['static'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

/* Mô tả dự toán */
$nametype = "mota-dutoan";
$config['static'][$nametype]['title_main'] = "Mô tả dự toán";
$config['static'][$nametype]['mota'] = true;
$config['static'][$nametype]['mota_cke'] = true;

/* Thông tin chi tiết dự toán */
$nametype = "detail-dutoan";
$config['static'][$nametype]['title_main'] = "Thông tin chi tiết dự toán";
$config['static'][$nametype]['mota'] = true;
$config['static'][$nametype]['mota_cke'] = true;

/* Liên hệ */
$nametype = "lienhe";
$config['static'][$nametype]['title_main'] = "Liên hệ";
$config['static'][$nametype]['noidung'] = true;
$config['static'][$nametype]['noidung_cke'] = true;

/* Seo page */
$config['seopage']['page'] = array(
    "product" => "Sản phẩm",
    "project" => "Dự án",
    "quality" => "Phẩm chất",
    "ideas-how-tos" => "Ý tưởng cách làm",
    "about" => "Giới thiệu",
    "dowload-catalog" => "Dowload Catalog",
    "contact" => "Liên hệ",
    "du-toan-cong-trinh" => "Dự toán công trình",
    "tim-kiem" => "Tìm kiếm",
);
$config['seopage']['size_images'] = '300x200';
$config['seopage']['thumb'] = '300x200x1';
$config['seopage']['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Setting */
$config['setting']['diachi'] = true;
$config['setting']['dienthoai'] = true;
$config['setting']['hotline'] = true;
$config['setting']['zalo'] = true;
$config['setting']['oaidzalo'] = true;
$config['setting']['email'] = true;
$config['setting']['website'] = true;
$config['setting']['fanpage'] = true;
$config['setting']['toado'] = true;
$config['setting']['toado_iframe'] = true;

/* Quản lý import */
$config['import']['images'] = false;
$config['import']['thumb'] = '100x100x1';
$config['import']['img_type'] = ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF";

/* Quản lý export */
$config['export']['category'] = false;

/* Quản lý tài khoản */
$config['user']['active'] = true;
$config['user']['admin'] = false;
$config['user']['visitor'] = true;

/* Quản lý phân quyền */
$config['permission'] = false;

/* Quản lý địa điểm */
$config['places']['active'] = false;
$config['places']['placesship'] = false;

/* Quản lý giỏ hàng */
$config['order']['active'] = false;
$config['order']['search'] = false;
$config['order']['excel'] = false;
$config['order']['word'] = false;
$config['order']['excelall'] = false;
$config['order']['wordall'] = false;
$config['order']['thumb'] = '100x100x1';

/* Quản lý thông báo đẩy */
$config['onesignal'] = false;

/* Quản lý mục (Không cấp) */
if(isset($config['news']))
{
    foreach($config['news'] as $key => $value)
    {
        if(!isset($value['dropdown']) || (isset($value['dropdown']) && $value['dropdown'] == false))
        { 
            $config['shownews'] = 1;
            break;
        }
    }
}
?>