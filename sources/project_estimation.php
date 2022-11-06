<?php  
if(!defined('SOURCES')) die("Error");
$banner = false;
$motaDutoan = $d->rawQueryOne("select mota$lang as mota from #_static where type = ? limit 0,1",array('mota-dutoan'));
$detailDutoan = $d->rawQueryOne("select mota$lang as mota from #_static where type = ? limit 0,1",array('detail-dutoan'));

$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));
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
/* breadCrumbs */
if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();

$dataEstimation = false;
$area = 0;
$data = [];
if (@$_GET['projectEstimation']==true) {

	function calculateUnitPrice($area,$price){
		return $area * $price;
	}

	function calculateArea($area,$persent){
		return $area * ($persent/100);
	}

	$id_loaicongtrinh = empty($_GET['id_loaicongtrinh']) ? null : htmlspecialchars($_GET['id_loaicongtrinh']);
	$id_dichvuxaynha = empty($_GET['id_dichvuxaynha']) ? null : htmlspecialchars($_GET['id_dichvuxaynha']);
	$id_mucdautu = empty($_GET['id_mucdautu']) ? null : htmlspecialchars($_GET['id_mucdautu']);
	$id_mattien = empty($_GET['id_mattien']) ? null : htmlspecialchars($_GET['id_mattien']);
	$width = empty($_GET['width']) ? 0 : htmlspecialchars($_GET['width']);
	$longs = empty($_GET['longs']) ? 0 : htmlspecialchars($_GET['longs']);
	$floor = empty($_GET['floor']) ? 0 : htmlspecialchars($_GET['floor']);
	$id_hem = empty($_GET['id_hem']) ? null : htmlspecialchars($_GET['id_hem']);
	$mezzanine = empty($_GET['mezzanine']) ? 0 : htmlspecialchars($_GET['mezzanine']);
	$rooftop = empty($_GET['rooftop']) ? 0 : htmlspecialchars($_GET['rooftop']);
	$id_santhuong = empty($_GET['id_santhuong']) ? null : htmlspecialchars($_GET['id_santhuong']);
	$id_bancong = empty($_GET['id_bancong']) ? null : htmlspecialchars($_GET['id_bancong']);
	$id_loaimong = empty($_GET['id_loaimong']) ? null : htmlspecialchars($_GET['id_loaimong']);
	$id_tangham = empty($_GET['id_tangham']) ? null : htmlspecialchars($_GET['id_tangham']);
	$id_mai = empty($_GET['id_mai']) ? null : htmlspecialchars($_GET['id_mai']);
	$garden = empty($_GET['garden']) ? 0 : htmlspecialchars($_GET['garden']);
	if ($id_loaicongtrinh && $id_dichvuxaynha && $id_mucdautu && $id_mattien) {
		$getDongia = $d->rawQueryOne("select gia from #_news where id_loaicongtrinh = ? and id_dichvuxaynha = ? and id_mucdautu = ? and id_mattien = ? and type = 'dongia'",array($id_loaicongtrinh,$id_dichvuxaynha,$id_mucdautu,$id_mattien));
		$dataEstimation = true;
		$area = $width * $longs;
		$gia = $getDongia['gia'];
		$priceOther = 0;

		$getLoaiCongTrinh = $d->rawQueryOne("select ten$lang as ten,dientich,phantram,id,kind from #_news where id = ?",array($id_loaicongtrinh));
		$getDichvuxaynha = $d->rawQueryOne("select ten$lang as ten from #_news where id = ?",array($id_dichvuxaynha));
		$getMucdautu = $d->rawQueryOne("select ten$lang as ten from #_news where id = ?",array($id_mucdautu));
		$getMattien = $d->rawQueryOne("select ten$lang as ten from #_news where id = ?",array($id_mattien));
		$getHem = $d->rawQueryOne("select ten$lang as ten,phantram from #_news where id = ?",array($id_hem));
		$getSanthuong = $d->rawQueryOne("select ten$lang as ten,phantram from #_news where id = ?",array($id_santhuong));
		$getBancong = $d->rawQueryOne("select ten$lang as ten,phantram from #_news where id = ?",array($id_bancong));
		$getLoaimong = $d->rawQueryOne("select ten$lang as ten,phantram from #_news where id = ?",array($id_loaimong));
		$getTangham = $d->rawQueryOne("select ten$lang as ten,phantram from #_news where id = ?",array($id_tangham));
		$getMai = $d->rawQueryOne("select ten$lang as ten,phantram from #_news where id = ?",array($id_mai));

		$loaimong = array(
			'ten' => $getLoaimong['ten'],
			'dientich' => calculateArea($area,$getLoaimong['phantram']),
			'thanhtien' => calculateUnitPrice(calculateArea($area,$getLoaimong['phantram']),$gia),
		);
		if ($loaimong) {
			array_push($data,$loaimong);
		}
		if ($getLoaiCongTrinh['kind']==1) {
			$value = array(
				'ten' => 'Tầng trệt',
				'dientich' => $area,
				'thanhtien' => calculateUnitPrice($area,$gia),
			);
			array_push($data,$value);
		}else{
			for ($i=0; $i < $floor; $i++) {
				$title = 'Tầng '.$i;
				if ($i == 0) {
					$title = 'Tầng trệt';
				}
				$value = array(
					'ten' => $title,
					'dientich' => $area,
					'thanhtien' => calculateUnitPrice($area,$gia),
				);
				array_push($data,$value);
			}	
		}
		

		$tangLung = array(
			'ten' => 'Lửng',
			'dientich' => $mezzanine,
			'thanhtien' => calculateUnitPrice($mezzanine,$gia),
		);
		if ($tangLung && $mezzanine > 0) {
			array_push($data,$tangLung);
		}

		$thongLung = array(
			'ten' => 'Thông lửng',
			'dientich' => calculateArea($area,50),
			'thanhtien' => calculateUnitPrice(calculateArea($area,50),$gia),
		);
		if ($thongLung) {
			array_push($data,$thongLung);
		}

		if ($getLoaiCongTrinh['kind']==0 && $getBancong['phantram'] > 0 && $floor > 1) {
			$f = ($floor - 1);
			$title = 'Bang công '.$f.' tầng';
			$value = array(
				'ten' => $title,
				'dientich' => calculateArea($area,$getBancong['phantram']),
				'thanhtien' => calculateUnitPrice(calculateArea($area,$getBancong['phantram']),$gia),
			);
			array_push($data,$value);
		}

		$tumTangthuong = array(
			'ten' => 'Tum (Tầng thượng)',
			'dientich' => $rooftop,
			'thanhtien' => calculateUnitPrice($rooftop,$gia),
		);
		if ($tumTangthuong && $rooftop > 0) {
			array_push($data,$tumTangthuong);
		}

		$sanThuong = array(
			'ten' => $getSanthuong['ten'],
			'dientich' => calculateArea($area,$getSanthuong['phantram']),
			'thanhtien' => calculateUnitPrice(calculateArea($area,$getSanthuong['phantram']),$gia),
		);
		if ($sanThuong) {
			array_push($data,$sanThuong);
		}

		$mai = array(
			'ten' => $getMai['ten'],
			'dientich' => calculateArea($area,$getMai['phantram']),
			'thanhtien' => calculateUnitPrice(calculateArea($area,$getMai['phantram']),$gia),
		);
		if ($mai) {
			array_push($data,$mai);
		}

		$tangHam = array(
			'ten' => $getTangham['ten'],
			'dientich' => calculateArea($area,$getTangham['phantram']),
			'thanhtien' => calculateUnitPrice(calculateArea($area,$getTangham['phantram']),$gia),
		);
		if ($tangHam && $getTangham['phantram'] > 0) {
			array_push($data,$tangHam);
		}

		$sanVuon = array(
			'ten' => 'Sân vườn + móng sân',
			'dientich' => $garden,
			'thanhtien' => calculateUnitPrice($garden,$gia),
		);
		if ($sanVuon && $garden > 0) {
			array_push($data,$sanVuon);
		}

		if (!empty($getHem) && $getHem['phantram'] > 0) {
			$priceOther += $gia * ($getHem['phantram'] / 100);
		}

		if (!empty($getLoaiCongTrinh) && $getLoaiCongTrinh['phantram'] > 0 && $getLoaiCongTrinh['dientich'] > 0 && ($area < $getLoaiCongTrinh['dientich'])) {
			$priceOther += $gia * ($getLoaiCongTrinh['phantram'] / 100);
		}
	}
}
?>