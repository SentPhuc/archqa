<div class="title-website"><span><?=@$title_crumb?></span></div>
<?php if ($com=="lien-he") {?>
	<div class="top-contact">
		<div class="d-flex flex-wrap justify-content-between align-items-start">
			<div class="col-xl-6 col-md-12">
				<div class="article-contact"><?=(isset($lienhe['noidung'.$lang]) && $lienhe['noidung'.$lang] != '') ? htmlspecialchars_decode($lienhe['noidung'.$lang]) : ''?></div>
			</div>
			<div class="col-xl-6 col-md-12">
				<form class="form-contact validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="input-contact col-sm-6">
							<input type="text" class="form-control" id="ten" name="ten" placeholder="<?=hoten?>" required />
							<div class="invalid-feedback"><?=vuilongnhaphoten?></div>
						</div>
						<div class="input-contact col-sm-6">
							<input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?=sodienthoai?>" required />
							<div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
						</div>         
					</div>
					<div class="row">
						<div class="input-contact col-sm-6">
							<input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?=diachi?>" required />
							<div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
						</div>
						<div class="input-contact col-sm-6">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
							<div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
						</div>
					</div>
					<div class="input-contact">
						<input type="text" class="form-control" id="tieude" name="tieude" placeholder="<?=chude?>" required />
						<div class="invalid-feedback"><?=vuilongnhapchude?></div>
					</div>
					<div class="input-contact">
						<textarea class="form-control" id="noidung" name="noidung" placeholder="<?=noidung?>" required /></textarea>
						<div class="invalid-feedback"><?=vuilongnhapnoidung?></div>
					</div>
					<div class="input-contact">
						<input type="file" class="custom-file-input" name="file">
						<label class="custom-file-label" for="file" title="<?=chon?>"><?=dinhkemtaptin?></label>
					</div>
					<input type="submit" class="btn btn-primary" name="submit-contact" value="<?=gui?>" disabled />
					<input type="reset" class="btn btn-secondary" value="<?=nhaplai?>" />
					<input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
				</form>
			</div>
		</div>
	</div>
	<div class="bottom-contact"><?=htmlspecialchars_decode($optsetting['toado_iframe'])?></div>
<?php }else if ($com=="video") {?>
	<div class="row__item__page">
		<?php if(isset($video) && count($video) > 0) { for($i=0;$i<count($video);$i++) { ?>
			<a class="video item__page text-decoration-none" data-fancybox="video" data-src="<?=$video[$i]['link_video']?>" title="<?=$video[$i]['ten'.$lang]?>">
				<p class="pic-video scale-img">
					<img onerror="this.src='<?=THUMBS?>/480x360x2/assets/images/noimage.png';" src="https://img.youtube.com/vi/<?=$func->getYoutube($video[$i]['link_video'])?>/0.jpg" alt="<?=$video[$i]['ten'.$lang]?>"/></p>
					<h3 class="name text-split"><?=$video[$i]['ten'.$lang]?></h3>
				</a>
			<?php } } else { ?>
				<div class="alert alert-warning w-100" role="alert">
					<strong><?=khongtimthayketqua?></strong>
				</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
		<div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
	<?php }else if ($com=="thu-vien-anh") {?>
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
		<div class="content-main w-clear">
			<?=(isset($static['noidung'.$lang]) && $static['noidung'.$lang] != '') ? htmlspecialchars_decode($static['noidung'.$lang]) : ''?>
		</div>
		<div class="share">
			<b><?=chiase?>:</b>
			<div class="social-plugin w-clear">
				<div class="addthis_inline_share_toolbox_qj48"></div>
				<div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
			</div>
		</div>
	<?php } ?>