<?php
if(!defined('SOURCES')) die("Error");

/* Query allpage */
$favicon = $d->rawQueryOne("select photo from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1",array('favicon','photo_static'));
$social = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('mangxahoi'));
$splistmenu = $d->rawQuery("select ten$lang as ten,titlesub$lang as titlesub,mota$lang as mota, tenkhongdau$lang as tenkhongdau, id,photo from #_product_list where type = ? and hienthi > 0 order by stt,id desc",array('product'));
$aboutCamhung = $d->rawQueryOne("select ten$lang as ten, tenkhongdau$lang as tenkhongdau, id from #_news where type = ? and menu > 0 and hienthi > 0 order by stt,id desc limit 0,1",array('about'));
$aboutPhamchat = $d->rawQuery("select ten$lang as ten, tenkhongdau$lang as tenkhongdau, id from #_news where type = ? and menu1 > 0 and hienthi > 0 order by stt,id desc limit 0,2",array('about'));

$footer = $d->rawQueryOne("select ten$lang, noidung$lang from #_static where type = ? limit 0,1",array('footer'));
$cs = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id, photo from #_news where type = ? and hienthi > 0 order by stt,id desc",array('chinh-sach'));

if ($source=='index') {
    $slider = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('slide'));
    $productList = $d->rawQuery("select ten$lang as ten,titlesub$lang as titlesub,mota$lang as mota, tenkhongdau$lang as tenkhongdau,photo, id from #_product_list where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('product'));
    $project = $d->rawQuery("select ten$lang as ten, tenkhongdau$lang as tenkhongdau,photo, id from #_project where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('project'));
    $why = $d->rawQuery("select ten$lang as ten, mota$lang as mota, id, photo from #_news where type = ? and hienthi > 0 order by stt,id desc",array('vi-sao-chon-chung-toi'));
    $custumer = $d->rawQuery("select ten$lang as ten, mota$lang as mota from #_news where type = ? and hienthi > 0 order by stt,id desc",array('cam-nhanh-khach-hang'));
    $newsnb = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, ngaytao, id, photo from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('tin-tuc'));
    $videonb = $d->rawQuery("select id from #_photo where noibat > 0 and type = ? and hienthi > 0",array('video'));
    $partner = $d->rawQuery("select ten$lang, link, photo from #_photo where type = ? and hienthi > 0 order by stt, id desc",array('doitac'));
}


/* Get statistic */
$counter = $statistic->getCounter();
$online = $statistic->getOnline();

/* Newsletter */
if(isset($_POST['submit-newsletter']))
{
    $responseCaptcha = $_POST['recaptcha_response_newsletter'];
    $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
    $scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
    $actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
    $testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

    if(($scoreCaptcha >= 0.5 && $actionCaptcha == 'Newsletter') || $testCaptcha == true)
    {
        $data = $_POST["data"];
        $data['ngaytao'] = time();

        if($d->insert('newsletter',$data))
        {
            $func->transfer("Đăng ký nhận tin thành công. Chúng tôi sẽ liên hệ với bạn sớm.",$config_base);
        }
        else
        {
            $func->transfer("Đăng ký nhận tin thất bại. Vui lòng thử lại sau.",$config_base, false);
        }
    }
    else
    {
        $func->transfer("Đăng ký nhận tin thất bại. Vui lòng thử lại sau.",$config_base, false);
    }
}
?>