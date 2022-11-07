<?php include TEMPLATE.LAYOUT."nav_page.php"; ?>
<div class="box-news">
	<div class="container">
		<?php if (count($news) > 0) {?>
			<div class="box-ideas d-flex align-items-start flex-wrap">
				<?php for ($i=0; $i < 2; $i++) {?>
					<div class="item__ideas-outstanding item__ideas">
						<a class="text-decoration-none" href="<?=$news[$i]['tenkhongdau']?>" title="<?=$news[$i]['ten']?>">
							<div class="img scale-img">
								<img onerror=src="<?=THUMBS."/635x310x1/"?>assets/images/noimage.png" src="<?=THUMBS."/640x310x1/".UPLOAD_NEWS_L.$news[$i]['photo']?>" alt="<?=$news[$i]['ten']?>">
							</div>
							<div class="info">
								<span class="titleCategory__ideas-outstanding">
									Hệ thống nội thất
								</span>
								<h3 class="name line-1">
									<?=$news[$i]['ten']?>
								</h3>
								<div class="desc line-2">
									<?=$news[$i]['mota']?>
								</div>
								<span class="date"><?=date('d \T\h\á\n\g m \N\ă\m Y',$news[$i]['ngaytao'])?></span>
							</div>
						</a>
					</div>
				<?php } ?>
				<?php if (count($news) > 2) {?>
					<?php for ($i=2; $i < count($news); $i++) {?>
						<div class="item__ideas">
							<a class="text-decoration-none" href="<?=$news[$i]['tenkhongdau']?>" title="<?=$news[$i]['ten']?>">
								<div class="img scale-img">
									<img onerror=src="<?=THUMBS."/425x300x1/"?>assets/images/noimage.png" src="<?=THUMBS."/425x300x1/".UPLOAD_NEWS_L.$news[$i]['photo']?>" alt="<?=$news[$i]['ten']?>">
								</div>
								<div class="info">
									<span class="titleCategory__ideas-outstanding">
										<?=$news[$i]['tieude_category']?>
									</span>
									<h3 class="name line-1">
										<?=$news[$i]['ten']?>
									</h3>
									<div class="desc line-2">
										<?=$news[$i]['mota']?>
									</div>
									<span class="date"><?=date('d \T\h\á\n\g m \N\ă\m Y',$news[$i]['ngaytao'])?></span>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
		<?php }else{?>
			<div class="alert alert-warning" role="alert">
				<strong><?=khongtimthayketqua?></strong>
			</div>
		<?php } ?>
	</div>
	<div class="pd70-0">
		<div class="container">
			<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		</div>
	</div>
</div>