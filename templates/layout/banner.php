<?php
$banner = $d->rawQueryOne("select photo,hienthi,ten$lang as ten,mota$lang as mota from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1",array('banner-'.$type,'photo_static'));
if (!empty($banner) && $banner['hienthi']==1) {
	$dataBannerten = !empty($banner['ten']) ? $banner['ten'] : $title_crumb;
	$dataBannerMota = $banner['mota'];
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
	?>
	<div class="bannerIn" style="background:url(<?=THUMBS."/1366x470x1/".$dataBannerPhoto?>) no-repeat center/cover;">
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
					</div>
					<?php if (!empty($dataBannerLink)) {?>
						<a href="<?=$dataBannerLink?>" title="Nhận báo giá">Nhận báo giá</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>