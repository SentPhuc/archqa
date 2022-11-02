<?php if(count($pronb)) { ?>
	<div class="wrap-product pt-4 pb-4">
		<div class="container">
			<div class="title-website"><span>Sản phẩm nổi bật</span></div>
			<div class="paging-product"></div>
		</div>
	</div>
<?php } ?>

<?php if(count($splistnb)) { foreach($splistnb as $vlist) { ?>
	<div class="wrap-product pt-4 pb-4">
		<div class="container">
			<div class="title-website"><span><?=$vlist['ten'.$lang]?></span></div>
			<div class="paging-product-category paging-product-category-<?=$vlist['id']?>" data-list="<?=$vlist['id']?>"></div>
		</div>
	</div>
<?php } } ?>

<?php if(count($newsnb) || count($videonb)) { ?>
	<div class="wrap-intro pt-4 pb-4">
		<div class="container d-flex align-items-start justify-content-between flex-wrap">
			<div class="item-col">
				<p class="title-intro"><span>Tin tức mới</span></p>
				<div class="d-flex align-items-start justify-content-between flex-wrap">
					<a class="newshome-best text-decoration-none" href="<?=$newsnb[0][$sluglang]?>" title="<?=$newsnb[0]['ten'.$lang]?>">
						<p class="pic-newshome-best scale-img mb-2">
							<?=$func->get_photo_static("",THUMBS."/360x200x1",false,UPLOAD_NEWS_L.$newsnb[0]['photo']);?>
						</p>
						<h3 class="name-newshome name line-2"><?=$newsnb[0]['ten'.$lang]?></h3>
						<p class="time-newshome">Ngày đăng: <?=date("d/m/Y",$newsnb[0]['ngaytao'])?></p>
						<p class="desc-newshome desc line-2"><?=$newsnb[0]['mota'.$lang]?></p>
						<span class="view-newshome transition"><?=xemthem?></span>
					</a>
					<div class="slick__page newshome-right" :show="3" :vertical="true">
						<?php foreach($newsnb as $v) { ?>
							<a class="newshome-normal d-flex align-items-start justify-content-between flex-wrap text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>">
								<p class="pic-newshome-normal scale-img mb-0">
									<?=$func->get_photo_static("",THUMBS."/150x120x1",false,UPLOAD_NEWS_L.$v['photo']);?>
								</p>
								<div class="info-newshome-normal">
									<h3 class="name-newshome name line-2"><?=$v['ten'.$lang]?></h3>
									<p class="time-newshome"><?=ngaydang?>: <?=date("d/m/Y",$v['ngaytao'])?></p>
									<p class="desc-newshome desc line-2"><?=$v['mota'.$lang]?></p>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="item-col">
				<p class="title-intro"><span>Video clip</span></p>
				<div class="videohome-intro">
					<?=$addons->setAddons('video-click', 'video-click', 10,"100%",290);?>
					<?php /* $addons->setAddons('video-select', 'video-select', 10); */ ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if(count($partner)) { ?>
	<div class="wrap-partner">
		<div class="container">
			<?=$func->get_photo("doitac","150x120x1","slick__page",':show="6" :autoplay="true"'); ?>
		</div>
	</div>
	<?php } ?>