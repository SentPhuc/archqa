<?php
$banner = $d->rawQueryOne("select photo,hienthi,ten$lang as ten,mota$lang,link from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1",array('banner-'.$type,'photo_static'));
if (@$idl > 0 && @$type=='product') {
	$banner = $pro_list;
}
if ((!empty($banner) && $banner['hienthi']==1)) {
	$thumbBanner = "/1920x470x1/";
	$dataBannerten = !empty($banner['ten']) ? $banner['ten'] : $title_crumb;
	$dataBannerMota = $banner['mota'.$lang];
	$dataBannerLink = null;
	$dataBannerPhoto = UPLOAD_PHOTO_L.$banner['photo'];
	if ($type=='about') {
		$dataBannerten = null;
	}
	if ($source=='contact') {
		$dataBannerMota = $optsetting['diachi'];;
		$dataBannerLink = 'contact';
	}
	if ($com=='quality' || $com=='ideas-how-tos') {
		$dataBannerLink = 'contact';
		if (@$idl > 0) {
			$dataBannerten = !empty($news_list['ten'.$lang]) ? $news_list['ten'.$lang] : '';
			$dataBannerMota = ($com=='ideas-how-tos') ? $news_list['mota'.$lang]:$news_list['noidung'.$lang];
			$dataBannerPhoto = UPLOAD_NEWS_L.$news_list['photo'];
		}
	}
	if (@$type=='product') {
		$dataBannerLink = 'contact';
		$dataBannerten = !empty($pro_list['ten'.$lang]) ? $pro_list['ten'.$lang] : '';
		$dataBannerMota = !empty($pro_list['mota'.$lang]) ? htmlspecialchars_decode($pro_list['mota'.$lang]) : '';;
		$dataBannerPhoto = UPLOAD_PRODUCT_L.$pro_list['photo'];
	}
	if ($com=='project' && @$idl==0) {
		$thumbBanner = "/1920x768x1/";
	}else{
		$dataBannerLink = 'contact';
	}
	?>
	<div class="bannerIn <?=($com=='project' && @$idl==0) ? 'bannerInForProject':''?>" style="background:url(<?=THUMBS.$thumbBanner.$dataBannerPhoto?>) no-repeat center/cover;">
		<?php if (!empty($dataBannerten) || !empty($dataBannerMota) || !empty($dataBannerLink)) {?>
			<div class="infoBanner">
				<div class="container d-flex align-items-start justify-content-between flex-wrap">
					<div class="info">
						<?php if (!empty($dataBannerten)) {?>
							<h3><?=$dataBannerten?></h3>
						<?php } ?>
						<?php if (!empty($dataBannerMota)) {?>
							<span><?=$dataBannerMota?></span>
						<?php } ?>
						<?php if ($com=='project' && @$idl==0) { ?>
							<div class="btn-banner">
								<a class="text-decoration-none transition" href="<?=$banner['link']?>" title="All project">All project</a>
								<a class="text-decoration-none transition" href="dowload-catalog" title="Download catalog">Download catalog</a>
							</div>
						<?php } ?>
					</div>
					<?php if (!empty($dataBannerLink)) {?>
						<a href="<?=$dataBannerLink?>" title="Nhận báo giá">Nhận báo giá</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>