<div class="title-website"><span><?=$row_detail['ten'.$lang]?></span></div>
<div class="content-main album-gallery w-clear">
	<div class="row">
		<?php if(count($hinhanhsp)>0) { for($i=0;$i<count($hinhanhsp);$i++) { ?>
			<a class="album col-md-4 col-xl-3 col-sm-6 text-decoration-none" data-fancybox="images" href="<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
				<p class="pic-album scale-img">
					<?=$func->get_photo_static("",THUMBS."/480x360x1",false,UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']);?>
				</p>
			</a>
		<?php } } else { ?>
			<div class="alert alert-warning w-100" role="alert">
				<strong><?=khongtimthayketqua?></strong>
			</div>
		<?php } ?>
	</div>
</div>