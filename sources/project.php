<?php  
if(!defined('SOURCES')) die("Error");

@$id = htmlspecialchars($_GET['id']);
@$idl = htmlspecialchars($_GET['idl']);
@$idc = htmlspecialchars($_GET['idc']);
@$idi = htmlspecialchars($_GET['idi']);
@$ids = htmlspecialchars($_GET['ids']);
@$idb = htmlspecialchars($_GET['idb']);

$getDatasql = "photo, ten$lang as ten, tenkhongdau$lang as tenkhongdau, giamoi, gia, giakm, id,address,year,units,masp";
$getDatasqlDetail = "type, id, ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, noidung$lang, masp, luotxem, id_brand, id_mau, id_size, id_list, id_cat, id_item, id_sub, id_tags, photo, options, giakm, giamoi, gia";

if($id!='')
{
	/* Lấy sản phẩm detail */
	$row_detail = $d->rawQueryOne("select $getDatasqlDetail from #_project where id = ? and type = ? and hienthi > 0 limit 0,1",array($id,$type));

	/* Cập nhật lượt xem */
	$data_luotxem['luotxem'] = $row_detail['luotxem'] + 1;
	$d->where('id',$row_detail['id']);
	$d->update('project',$data_luotxem);

	/* Lấy tags */
	if($row_detail['id_tags']) $pro_tags = $d->rawQuery("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_tags where id in (".$row_detail['id_tags'].") and type='".$type."'");

	/* Lấy thương hiệu */
	$pro_brand = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_project_brand where id = ? and type = ? and hienthi > 0",array($row_detail['id_brand'],$type));

	/* Lấy màu */
	if($row_detail['id_mau']) $mau = $d->rawQuery("select loaihienthi, photo, mau, id from #_project_mau where type='".$type."' and find_in_set(id,'".$row_detail['id_mau']."') and hienthi > 0 order by stt,id desc");

	/* Lấy size */
	if($row_detail['id_size']) $size = $d->rawQuery("select id, ten$lang from #_project_size where type='".$type."' and find_in_set(id,'".$row_detail['id_size']."') and hienthi > 0 order by stt,id desc");

	/* Lấy cấp 1 */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_project_list where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_list'],$type));

	/* Lấy cấp 2 */
	$pro_cat = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_project_cat where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_cat'],$type));

	/* Lấy cấp 3 */
	$pro_item = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_project_item where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_item'],$type));

	/* Lấy cấp 4 */
	$pro_sub = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen from #_project_sub where id = ? and type = ? and hienthi > 0 limit 0,1",array($row_detail['id_sub'],$type));
	
	/* Lấy hình ảnh con */
	$hinhanhsp = $d->rawQuery("select photo from #_gallery where id_photo = ? and com='project' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc",array($row_detail['id'],$type,$type));

	/* Lấy sản phẩm cùng loại */
	$where = "";
	$where = "id <> ? and id_list = ? and type = ? and hienthi > 0";
	$params = array($id,$row_detail['id_list'],$type);

	$curPage = $get_page;
	$per_page = 8;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_project where $where order by stt,id desc $limit";
	$project = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_project where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* SEO */
	$seoDB = $seo->getSeoDB($row_detail['id'],'project','man',$row_detail['type']);
	$seo->setSeo('h1',$row_detail['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$row_detail['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($row_detail['options']) && $row_detail['options'] != '') ? json_decode($row_detail['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $row_detail['photo']))
	{
		$img_json_bar = $func->getImgSize($row_detail['photo'],UPLOAD_PROJECT_L.$row_detail['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'project',$row_detail['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PROJECT_L.$row_detail['photo']);
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

	@$id_location = !empty($_GET['id_location']) ? htmlspecialchars($_GET['id_location']) : 0;
	@$id_type = !empty($_GET['id_type']) ? htmlspecialchars($_GET['id_type']) : 0;

	/* Lấy cấp 1 detail */
	$pro_list = $d->rawQueryOne("select id, ten$lang, tenkhongdauvi, tenkhongdauen, type, photo, options from #_project_list where id = ? and type = ? limit 0,1",array($idl,$type));

	/* SEO */
	$title_cat = $pro_list['ten'.$lang];
	$seoDB = $seo->getSeoDB($pro_list['id'],'project','man_list',$pro_list['type']);
	$seo->setSeo('h1',$pro_list['ten'.$lang]);
	if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
	else $seo->setSeo('title',$pro_list['ten'.$lang]);
	if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
	if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
	$seo->setSeo('url',$func->getPageURL());
	$img_json_bar = (isset($pro_list['options']) && $pro_list['options'] != '') ? json_decode($pro_list['options'],true) : null;
	if($img_json_bar == null || ($img_json_bar['p'] != $pro_list['photo']))
	{
		$img_json_bar = $func->getImgSize($pro_list['photo'],UPLOAD_PROJECT_L.$pro_list['photo']);
		$seo->updateSeoDB(json_encode($img_json_bar),'project_list',$pro_list['id']);
	}
	if(count($img_json_bar) > 0)
	{
		$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PROJECT_L.$pro_list['photo']);
		$seo->setSeo('photo:width',$img_json_bar['w']);
		$seo->setSeo('photo:height',$img_json_bar['h']);
		$seo->setSeo('photo:type',$img_json_bar['m']);
	}

	/* Lấy sản phẩm */
	$where = "id<>0";

	if ($id_location) {
		$where .= " and id_vitri='".$id_location."'";
	}

	if ($id_type) {
		$where .= " and id_kieu='".$id_type."'";
	}

	$where .= " and id_list = ? and type = ? and hienthi > 0";
	$params = array($idl,$type);

	$curPage = $get_page;
	$per_page = $optsetting["countpro1"];
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_project where $where order by stt,id desc $limit";
	$project = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_project where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	if($pro_list != null) $breadcr->setBreadCrumbs($pro_list[$sluglang],$pro_list['ten'.$lang]);
	$breadcrumbs = $breadcr->getBreadCrumbs();

	$filterLocation = $d->rawQuery("select ten$lang as ten,id from #_project where type = ? and hienthi = 1 order by stt,id desc",array('filter-vitri-project')); 
	$filterType = $d->rawQuery("select ten$lang as ten,id from #_project where type = ? and hienthi = 1 order by stt,id desc",array('filter-kieu-project')); 
}
else
{
	/* SEO */
	$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));

	/* Lấy tất cả sản phẩm */
	$where = "";
	$where = "type = ? and hienthi > 0";
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
	$per_page = 4;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select $getDatasql from #_project where $where order by stt,id desc $limit";
	$project = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_project where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();
	$breadcrumbs = null;
	$banner = true;

	$bannerProject = $d->rawQueryOne("select photo,hienthi,ten$lang as ten from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1",array('banner-contact-project','photo_static'));
	$describeProject = $d->rawQueryOne("select ten$lang as ten,mota$lang as mota from #_static where type = ? limit 0,1",array('mota-project'));
	$newsProject = $d->rawQuery("select ten$lang as ten, mota$lang as mota,theme,id,type from #_news where type = ? and hienthi > 0 order by stt,id desc",array('news-project'));
	$partner = $d->rawQuery("select ten$lang, link, photo from #_photo where type = ? and hienthi > 0 order by stt, id desc",array('doitac'));
	$serviceProject = $d->rawQuery("select ten$lang as ten, mota$lang as mota,photo from #_news where type = ? and hienthi > 0 order by stt,id desc",array('dich-vu-chuyen-nghiep'));
	$pro_list = $d->rawQuery("select tenkhongdauvi, tenkhongdauen from #_project_list where type = ? order by id,stt asc",array($type));
}
?>