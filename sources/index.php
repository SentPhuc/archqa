<?php  
	if(!defined('SOURCES')) die("Error");

    /* SEO */
    $logo = $d->rawQueryOne("select id, photo, options from #_photo where type = ? and act = ? limit 0,1",array('logo','photo_static'));
    $seoDB = $seo->getSeoDB(0,'setting','capnhat','setting');
    if(!empty($seoDB['title'.$seolang])) $seo->setSeo('h1',$seoDB['title'.$seolang]);
    if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
    if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
    if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
    $seo->setSeo('url',$func->getPageURL());
    $img_json_bar = (isset($logo['options']) && $logo['options'] != '') ? json_decode($logo['options'],true) : null;
    if($img_json_bar == null || ($img_json_bar['p'] != $logo['photo']))
    {
        $img_json_bar = $func->getImgSize($logo['photo'],UPLOAD_PHOTO_L.$logo['photo']);
        $seo->updateSeoDB(json_encode($img_json_bar),'photo',$logo['id']);
    }
    if(count($img_json_bar) > 0)
    {
        $seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PHOTO_L.$logo['photo']);
        $seo->setSeo('photo:width',$img_json_bar['w']);
        $seo->setSeo('photo:height',$img_json_bar['h']);
        $seo->setSeo('photo:type',$img_json_bar['m']);
    }
?>