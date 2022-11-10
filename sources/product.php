<?php  
if(!defined('SOURCES')) die("Error");

@$id = htmlspecialchars($_GET['id']);
@$idl = htmlspecialchars($_GET['idl']);
@$idc = htmlspecialchars($_GET['idc']);
@$idi = htmlspecialchars($_GET['idi']);
@$ids = htmlspecialchars($_GET['ids']);
@$idb = htmlspecialchars($_GET['idb']);
@$kind = !empty($_GET['kind']) ? htmlspecialchars($_GET['kind']) : '';

if ($idl > 0 || $idc > 0 || $com == 'product') {
	/* get data filter */
	@$sort = !empty($_GET['sort']) ? htmlspecialchars($_GET['sort']) : '';
	if ($idl > 0 || $idc > 0) {
		@$keyword = !empty($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '';
		$whereFilter = $func->getDataFilter($_GET);
	}
}
$getDatasql = "photo, ten$lang as ten, tenkhongdau$lang as tenkhongdau, giamoi, gia, giakm, id,masp,countLike";
$getDatasqlDetail = "type, id, ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, noidung$lang, masp, luotxem, id_brand, id_mau, id_size, id_list, id_cat, id_item, id_sub, id_tags, photo, options, giakm, giamoi, gia";

if($id!='')
{
	/* Lấy sản phẩm detail */
	$row_detail = $d->rawQueryOne("select $getDatasqlDetail from #_product where id = ? and type = ? and hienthi > 0 limit 0,1",array($id,$type));

	/* Cập nhật lượt xem */
	$data_luotxem['luotxem'] = $row_detail['luotxem'] + 1;
	$d->where('id',$row_detail['id']);
	$d->update('product',$data_luotxem);

	/* Lấy tags */
	$tags = $func->getTagsInCategoryOrProduct($row_detail['id_tags'],0,$type);

	/* Lấy thương hiệu */
	$pro_brand = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_brand where id = ? and type = ? and hienthi > 0",array($row_detail['id_brand'],$type));

	/* Lấy màu */
	if($row_detail['id_mau']) $mau = $d->rawQuery("select loaihienthi, photo, mau, id from #_product_mau where type='".$type."' and find_in_set(id,'".$row_detail['id_mau']."') and hienthi > 0 order by stt,id desc");

	/* Lấy size */
	if($row_detail['id_size']) $size = $d->rawQuery("select id, ten$lang from #_product_size where type='".$type."' and find_in_set(id,'".$row_detail['id_size']."') and hienthi > 0 order by stt,id desc");

	/* Lấy cấp 1 */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_list where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_list'],$type));

	/* Lấy cấp 2 */
	$pro_cat = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_cat where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_cat'],$type));

	/* Lấy cấp 3 */
	$pro_item = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_item where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_item'],$type));

	/* Lấy cấp 4 */
	$pro_sub = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_sub where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_sub'],$type));
	
	/* Lấy hình ảnh con */
	$hinhanhsp = $d->rawQuery("select photo from #_gallery where id_photo = ? and com='product' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc",array($row_detail['id'],$type,$type));

	/* Lấy sản phẩm cùng loại */
	$where = "";
	$where = "id <> ? and id_list = ? and type = ? and hienthi > 0";
	$params = array($id,$row_detail['id_list'],$type);

	$curPage = $get_page;
	$per_page = 8;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where order by stt,id desc $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* SEO */
	$seoDB = $seo->getSeoDB($row_detail['id'],'product','man',$row_detail['type']);
	$seo->setSeo('h1',$row_detail['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$row_detail['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($row_detail['options']) && $row_detail['options'] != '') ? json_decode($row_detail['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $row_detail['photo']))
	{
		$img_json_bar = $func->getImgSize($row_detail['photo'],UPLOAD_PRODUCT_L.$row_detail['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'product',$row_detail['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PRODUCT_L.$row_detail['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	if($pro_list != null) $breadcr->setBreadCrumbs($pro_list[$sluglang],$pro_list['ten'.$lang]);
	if($pro_cat != null) $breadcr->setBreadCrumbs($pro_cat[$sluglang],$pro_cat['ten'.$lang]);
	if($pro_item != null) $breadcr->setBreadCrumbs($pro_item[$sluglang],$pro_item['ten'.$lang]);
	if($pro_sub != null) $breadcr->setBreadCrumbs($pro_sub[$sluglang],$pro_sub['ten'.$lang]);
	$breadcr->setBreadCrumbs($row_detail[$sluglang],$row_detail['ten'.$lang]);
	$breadcrumbs = $breadcr->getBreadCrumbs();
}else if($idl!=''){

	$banner = true;

	/* Lấy cấp 1 detail */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen, type, photo, options,hienthi,mota$lang,noidung$lang,cat,id_filter from #_product_list where id = ? and type = ? limit 0,1",array($idl,$type));

	$getQA = $d->rawQuery("select ten$lang, mota$lang from #_gallery where id_photo = ? and com='product' and type = ? and kind='man_list' and val = ? and hienthi > 0 order by stt,id desc",array($pro_list['id'],$type,'tuy-chinh'));

	$contentPro = $pro_list['noidung'.$lang];
	$tags = $func->getTagsInCategoryOrProduct(0,$idl,$type);

	/* SEO */
	$title_cat = $pro_list['ten'.$lang];
	$seoDB = $seo->getSeoDB($pro_list['id'],'product','man_list',$pro_list['type']);
	$seo->setSeo('h1',$pro_list['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$pro_list['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($pro_list['options']) && $pro_list['options'] != '') ? json_decode($pro_list['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $pro_list['photo']))
	{
		$img_json_bar = $func->getImgSize($pro_list['photo'],UPLOAD_PRODUCT_L.$pro_list['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'product_list',$pro_list['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PRODUCT_L.$pro_list['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* Lấy sản phẩm */
	$where = "id <> 0";
	$orderBy = "order by stt,id desc";
	if ($sort) {
		if ($sort=='date') {
			$orderBy = "order by ngaytao desc";
		}else if($sort=='like'){
			$orderBy = "order by countLike desc";
		}
	}

	if ($keyword) {
		$where .= " and (ten$lang LIKE '%$keyword%' or tenkhongdauvi LIKE '%$keyword%' or tenkhongdauen LIKE '%$keyword%')";
	}

	$where .= " and id_list = ? and type = ? and hienthi > 0";
	$params = array($idl,$type);

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where $whereFilter $orderBy $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where $whereFilter $orderBy";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	if($pro_list != null) $breadcr->setBreadCrumbs($pro_list[$sluglang],$pro_list['ten'.$lang]);
	$breadcrumbs = $breadcr->getBreadCrumbs();

	$catNav = null;
	if ($pro_list['cat'] > 0) {
		$catNav = $d->rawQuery("select ten$lang as ten,id,tenkhongdau$lang as tenkhongdau from #_product_cat where type = ? and id_list = ? and hienthi = 1 order by stt,id desc",array($type,$idl));
	}
	$listNav = $d->rawQuery("select ten$lang as ten,id,tenkhongdau$lang as tenkhongdau,photo1,photo2 from #_product_list where type = ? and hienthi = 1 order by stt,id desc",array($type));

	$idlActive = $pro_list['id'];
	$idcActive = null;
	$linkAllCat = $pro_list['tenkhongdau'.$lang];
	$filterList = !empty($pro_list['id_filter']) ? explode(',',$pro_list['id_filter']) : null;
	$pathFilters = $pro_list['tenkhongdau'.$lang];

}
else if($idc!='')
{
	$banner = false;
	/* Lấy cấp 2 detail */
	$pro_cat = $d->rawQueryOne("select id, id_list, ten$lang, tenkhongdauvi, tenkhongdauen, type, photo, options from #_product_cat where id = ? and type = ? limit 0,1",array($idc,$type));

	/* Lấy cấp 1 */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen,cat,id_filter,noidung$lang from #_product_list where id = ? and type = ? limit 0,1",array($pro_cat['id_list'],$type));

	$contentPro = $pro_list['noidung'.$lang];

	$getQA = $d->rawQuery("select ten$lang, mota$lang from #_gallery where id_photo = ? and com='product' and type = ? and kind='man_list' and val = ? and hienthi > 0 order by stt,id desc",array($pro_list['id'],$type,'tuy-chinh'));

	/* Lấy sản phẩm */
	$where = "id <> 0";
	$orderBy = "order by stt,id desc";
	if ($sort) {
		if ($sort=='date') {
			$orderBy = "order by ngaytao desc";
		}else if($sort=='like'){
			$orderBy = "order by countLike desc";
		}
	}

	if ($keyword) {
		$where .= " and (ten$lang LIKE '%$keyword%' or tenkhongdauvi LIKE '%$keyword%' or tenkhongdauen LIKE '%$keyword%')";
	}
	$where = "id_cat = ? and type = ? and hienthi > 0";
	$params = array($idc,$type);

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where $whereFilter $orderBy $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where $whereFilter $orderBy";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* SEO */
	$title_cat = $pro_cat['ten'.$lang];
	$seoDB = $seo->getSeoDB($pro_cat['id'],'product','man_cat',$pro_cat['type']);
	$seo->setSeo('h1',$pro_cat['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$pro_cat['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($pro_cat['options']) && $pro_cat['options'] != '') ? json_decode($pro_cat['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $pro_cat['photo']))
	{
		$img_json_bar = $func->getImgSize($pro_cat['photo'],UPLOAD_PRODUCT_L.$pro_cat['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'product_cat',$pro_cat['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PRODUCT_L.$pro_cat['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	if($pro_list != null) $breadcr->setBreadCrumbs($pro_list[$sluglang],$pro_list['ten'.$lang]);
	if($pro_cat != null) $breadcr->setBreadCrumbs($pro_cat[$sluglang],$pro_cat['ten'.$lang]);
	$breadcrumbs = $breadcr->getBreadCrumbs();

	$catNav = null;
	if ($pro_list['cat'] > 0) {
		$catNav = $d->rawQuery("select ten$lang as ten,id,tenkhongdau$lang as tenkhongdau from #_product_cat where type = ? and id_list = ? and hienthi = 1 order by stt,id desc",array($type,$pro_list['id']));
	}
	$listNav = $d->rawQuery("select ten$lang as ten,id,tenkhongdau$lang as tenkhongdau,photo1,photo2 from #_product_list where type = ? and hienthi = 1 order by stt,id desc",array($type));

	$idlActive = $pro_list['id'];
	$idcActive = $pro_cat['id'];
	$linkAllCat = $pro_list['tenkhongdau'.$lang];
	$filterList = !empty($pro_list['id_filter']) ? explode(',',$pro_list['id_filter']) : null;
	$pathFilters = $pro_cat['tenkhongdau'.$lang];
}
else if($idi!='')
{
	/* Lấy cấp 3 detail */
	$pro_item = $d->rawQueryOne("select id, id_list, id_cat, ten$lang, tenkhongdauvi, tenkhongdauen, type, photo, options from #_product_item where id = ? and type = ? limit 0,1",array($idi,$type));

	/* Lấy cấp 1 */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_list where id = ? and type = ? limit 0,1",array($pro_item['id_list'],$type));

	/* Lấy cấp 2 */
	$pro_cat = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_cat where id_list = ? and id = ? and type = ? limit 0,1",array($pro_item['id_list'],$pro_item['id_cat'],$type));

	/* Lấy sản phẩm */
	$where = "";
	$where = "id_item = ? and type = ? and hienthi > 0";
	$params = array($idi,$type);

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where order by stt,id desc $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* SEO */
	$title_cat = $pro_item['ten'.$lang];
	$seoDB = $seo->getSeoDB($pro_item['id'],'product','man_item',$pro_item['type']);
	$seo->setSeo('h1',$pro_item['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$pro_item['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($pro_item['options']) && $pro_item['options'] != '') ? json_decode($pro_item['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $pro_item['photo']))
	{
		$img_json_bar = $func->getImgSize($pro_item['photo'],UPLOAD_PRODUCT_L.$pro_item['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'product_item',$pro_item['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PRODUCT_L.$pro_item['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	if($pro_list != null) $breadcr->setBreadCrumbs($pro_list[$sluglang],$pro_list['ten'.$lang]);
	if($pro_cat != null) $breadcr->setBreadCrumbs($pro_cat[$sluglang],$pro_cat['ten'.$lang]);
	if($pro_item != null) $breadcr->setBreadCrumbs($pro_item[$sluglang],$pro_item['ten'.$lang]);
	$breadcrumbs = $breadcr->getBreadCrumbs();
}
else if($ids!='')
{
	/* Lấy cấp 4 */
	$pro_sub = $d->rawQueryOne("select id, id_list, id_cat, id_item, ten$lang, tenkhongdauvi, tenkhongdauen, type, photo, options from #_product_sub where id = ? and type = ? limit 0,1",array($ids,$type));

	/* Lấy cấp 1 */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_list where id = ? and type = ? limit 0,1",array($pro_sub['id_list'],$type));

	/* Lấy cấp 2 */
	$pro_cat = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_cat where id_list = ? and id = ? and type = ? limit 0,1",array($pro_sub['id_list'],$pro_sub['id_cat'],$type));

	/* Lấy cấp 3 */
	$pro_item = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_product_item where id_list = ? and id_cat = ? and id = ? and type = ? limit 0,1",array($pro_sub['id_list'],$pro_sub['id_cat'],$pro_sub['id_item'],$type));

	/* Lấy sản phẩm */
	$where = "";
	$where = "id_sub = ? and type = ? and hienthi > 0";
	$params = array($ids,$type);

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where order by stt,id desc $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* SEO */
	$title_cat = $pro_sub['ten'.$lang];
	$seoDB = $seo->getSeoDB($pro_sub['id'],'product','man_sub',$pro_sub['type']);
	$seo->setSeo('h1',$pro_sub['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$pro_sub['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($pro_sub['options']) && $pro_sub['options'] != '') ? json_decode($pro_sub['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $pro_sub['photo']))
	{
		$img_json_bar = $func->getImgSize($pro_sub['photo'],UPLOAD_PRODUCT_L.$pro_sub['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'product_sub',$pro_sub['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PRODUCT_L.$pro_sub['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	if($pro_list != null) $breadcr->setBreadCrumbs($pro_list[$sluglang],$pro_list['ten'.$lang]);
	if($pro_cat != null) $breadcr->setBreadCrumbs($pro_cat[$sluglang],$pro_cat['ten'.$lang]);
	if($pro_item != null) $breadcr->setBreadCrumbs($pro_item[$sluglang],$pro_item['ten'.$lang]);
	if($pro_sub != null) $breadcr->setBreadCrumbs($pro_sub[$sluglang],$pro_sub['ten'.$lang]);
	$breadcrumbs = $breadcr->getBreadCrumbs();
}
else if($idb!='')
{
	/* Lấy brand detail */
	$pro_brand = $d->rawQueryOne("select ten$lang as ten, tenkhongdau$lang as tenkhongdau, id, type, photo, options from #_product_brand where id = ? and type = ? limit 0,1",array($idb,$type));

	/* SEO */
	$title_cat = $pro_brand['ten'];
	$seoDB = $seo->getSeoDB($pro_brand['id'],'product','man_brand',$pro_brand['type']);
	$seo->setSeo('h1',$pro_brand['ten']);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$pro_brand['ten']);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($pro_brand['options']) && $pro_brand['options'] != '') ? json_decode($pro_brand['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $pro_brand['photo']))
	{
		$img_json_bar = $func->getImgSize($pro_brand['photo'],UPLOAD_PRODUCT_L.$pro_brand['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'product_brand',$pro_brand['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PRODUCT_L.$pro_brand['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* Lấy sản phẩm */
	$where = "";
	$where = "id_brand = ? and type = ? and hienthi > 0";
	$params = array($pro_brand['id'],$type);

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where order by stt,id desc $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* breadCrumbs */
	$breadcr->setBreadCrumbs($pro_brand['tenkhongdau'],$title_cat);
	$breadcrumbs = $breadcr->getBreadCrumbs();
}
else
{
	/* SEO */
	$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));

	/* Lấy tất cả sản phẩm */
	$where = "id<>0";
	$orderBy = "order by stt,id desc";
	if ($sort) {
		if ($sort=='date') {
			$orderBy = "order by ngaytao desc";
		}else if($sort=='like'){
			$orderBy = "order by countLike desc";
		}
	}

	$where .= " and type = ? and hienthi > 0";

	if (!empty($kind)) {
		$arrayIDs = [];
		$id_user = !empty($_SESSION[$login_member]['id']) ? $_SESSION[$login_member]['id'] : 0;
		$listNav = null;
		$title_crumb = 'Sản phẩm yêu thích';
		$getProductSave = $d->rawQuery("select id_pro from #_product_save where value > 0 and id_user = ? and type = ?",array($id_user,$type));
		foreach ($getProductSave as $value) {
			array_push($arrayIDs,$value['id_pro']);
		}
		if (!empty($arrayIDs)) $where .= " and id in (".implode(',',$arrayIDs).")";

	}else{
		$listNav = $d->rawQuery("select ten$lang as ten,id,tenkhongdau$lang as tenkhongdau,photo1,photo2 from #_product_list where type = ? and hienthi = 1 order by stt,id desc",array($type));
	}

	$params = array($type);

	/* Tìm kiếm sản phẩm */
	if ($com=='tim-kiem') {
		$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($com));
		if(isset($_GET['keyword']))
		{
			$tukhoa = htmlspecialchars($_GET['keyword']);
			$tukhoa = $func->changeTitle($tukhoa);

			if($tukhoa)
			{
				$where .= " and (ten$lang LIKE ? or tenkhongdauvi LIKE ? or tenkhongdauen LIKE ?)";
				array_push($params, "%$tukhoa%","%$tukhoa%","%$tukhoa%");
			}
		}
	}

	/* Data SEO */
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

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_product where $where $orderBy $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_product where $where $orderBy";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();

	$banner = false;
	$catNav = null;
	$idlActive = null;
	$idcActive = null;
	$linkAllCat = null;
	$filterList = null;
	$pathFilters = $com;
}
?>