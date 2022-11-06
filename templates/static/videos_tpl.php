<div class="box-static pt-0">
	<?php include TEMPLATE.LAYOUT."nav_page.php"; ?>
	<div class="container">
		<?php if (count($news) > 0) {?>
			<div class="box-video d-flex flex-wrap">
				<?php foreach ($news as $key => $value) {?>
					<a class="item__videos text-decoration-none" data-fancybox="videos" href="<?=$value['link_video']?>" title="<?=$value['ten']?>">
						<div class="img scale-img">
							<img onerror=src="<?=THUMBS."/406x306x1/"?>assets/images/noimage.png" src="<?=THUMBS."/406x306x1/".UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
						</div>
						<h3 class="name mb-0"><?=$value['ten']?></h3>
					</a>
				<?php } ?>
			</div>
			<div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
		<?php }else{ ?>
			<div class="alert alert-warning w-100" role="alert">
				<strong><?=khongtimthayketqua?></strong>
			</div>
		<?php } ?>
	</div>
</div>