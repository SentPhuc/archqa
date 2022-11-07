<div class="box-news quality">
	<?php if ($idl > 0 && count($news) > 0) {?>
		<div class="main-navPage">
			<div class="container">
				<div class="nav-cat">
					<?php foreach ($news as $key => $value) {?>
						<a class="item__quality text-decoration-none transition <?=($idl == $value['id']) ? 'active':''?>" href="javascript:;" title="<?=$value['ten']?>"><?=$value['ten']?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="container <?=(count($news) == 0) ? 'pt-3 pb-3':''?>">
		<?php if ($idl > 0) {?>
			<?php if (count($news) > 0) {?>
				<div class="main-quality-list d-flex align-items-end justify-content-between flex-wrap">
					<?php foreach ($news as $key => $value) {
						$galleryNewsQuality = $d->rawQuery("select photo from #_gallery where id_photo = ? and com='news' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc",array($value['id'],$value['type'],$value['type']));
						?>
						<div class="door-item itemQuality">
							<div class="top d-flex align-items-center justify-content-between flex-wrap">
								<div class="img-list-con">
									<div class="img-list-prev iconfont icon-next-m" title="prev"></div>
									<div class="img-list-next iconfont icon-next-m" title="next"></div>
									<div class="swiper-container swiper-quality">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<img onerror=src="<?=THUMBS."/400x440x1/"?>assets/images/noimage.png" src="<?=THUMBS."/400x440x1/".UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
											</div>
											<?php foreach ($galleryNewsQuality as $keyg => $valueg) {?>
												<div class="swiper-slide">
													<img onerror=src="<?=THUMBS."/400x440x1/"?>assets/images/noimage.png" src="<?=THUMBS."/400x440x1/".UPLOAD_NEWS_L.$valueg['photo']?>" alt="<?=$value['ten']?>">
												</div>
											<?php } ?>
										</div>
										<div class="swiper-pagination"></div>
									</div>
								</div>
								<div class="info">
									<h3 class="name line-1"><?=$value['ten']?></h3>
									<div class="desc"><?=htmlspecialchars_decode($value['mota'])?></div>
								</div>
							</div>
							<div class="thumb-con">
								<div class="thumb-item">
									<span>
										<img onerror=src="<?=THUMBS."/86x72x1/"?>assets/images/noimage.png" src="<?=THUMBS."/86x72x1/".UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
									</span>
								</div>
								<?php foreach ($galleryNewsQuality as $keyg => $valueg) {?>
									<div class="thumb-item">
										<span>
											<img onerror=src="<?=THUMBS."/86x72x1/"?>assets/images/noimage.png" src="<?=THUMBS."/86x72x1/".UPLOAD_NEWS_L.$valueg['photo']?>" alt="<?=$value['ten']?>">
										</span>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php }else{?>
				<div class="alert alert-warning w-100 mb-0" role="alert">
					<strong><?=khongtimthayketqua?></strong>
				</div>
			<?php } ?>
			<div class="box-main-supplier">
				<?php
				$thumb = '432x150x2';
				if ($deviceType=='mobile') {
					$thumb = '100x80x1';
				}
				?>
				<div class="title">Nhà cung cấp chúng tôi</div>
				<?=$func->get_photo("nhacungcap",$thumb,"box",''); ?>
			</div>

		<?php }else{ ?>
			<div class="title-website"><span>Kiểm soát chất lượng</span></div>
			<div class="main-quality d-flex align-items-end justify-content-between flex-wrap">
				<div class="item-col">
					<img onerror=src="<?=THUMBS."/400x440x1/"?>assets/images/noimage.png" src="<?=THUMBS."/400x440x1/".UPLOAD_NEWS_L.$motaQuality['photo']?>" alt="<?=$motaQuality['ten']?>">
				</div>
				<div class="item-col">
					<h3 class="title"><?=$motaQuality['ten']?></h3>
					<div class="desc line-3"><?=$motaQuality['mota']?></div>
					<?php if (count($list) > 0) {?>
						<div class="box-listQuality d-flex justify-content-between flex-wrap">
							<?php foreach ($list as $key => $value) {?>
								<a class="item__listQuality text-decoration-none" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>">
									<span class="transition"><?=$value['ten']?>:</span>
									<div class="desc line-2"><?=$value['mota']?></div>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php if (count($newsQuality) > 0) {?>
				<div class="box-newsQuality d-flex justify-content-between flex-wrap">
					<?php foreach ($newsQuality as $key => $value) {?>
						<a target="_blank" class="item__newsQuality text-decoration-none" href="<?=$value['link']?>" title="<?=$value['ten']?>">
							<span class="title transition line-1"><?=$value['ten']?></span>
							<div class="desc line-3"><?=$value['mota']?></div>
							<span class="viewsMoreAll">Xem nhà cung cấp</span>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="pd70-0"><?php include TEMPLATE.LAYOUT."form_getquote.php"; ?></div>
	</div>
</div>