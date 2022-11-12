<div class="container pd40-0">
	<?php if($com=="thu-vien-anh") {?>
		<div class="row__item__page">
			<?php if(count($product)>0) { for($i=0;$i<count($product);$i++) { ?>
				<a class="album item__page text-decoration-none" href="<?=$product[$i]["tenkhongdau"]?>" title="<?=$product[$i]['ten']?>">
					<p class="pic-album scale-img">
						<?=$func->get_photo_static("",$config['theme'][$type]['size'],false,$config['theme'][$type]['dir'].$product[$i][$config['theme'][$type]['column']]);?>
					</p>
					<h3 class="name text-split"><?=$product[$i]['ten']?></h3>
				</a>
			<?php } } else { ?>
				<div class="alert alert-warning w-100" role="alert">
					<strong><?=khongtimthayketqua?></strong>
				</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
		<div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
	<?php }else{?>
		<div class="title-website"><span><?=@$title_crumb?></span></div>
		<div class="content-main w-clear">
			<?=(isset($static['noidung'.$lang]) && $static['noidung'.$lang] != '') ? htmlspecialchars_decode($static['noidung'.$lang]) : ''?>
		</div>
		<?php include TEMPLATE.LAYOUT."social.php"; ?>
	<?php } ?>
</div>