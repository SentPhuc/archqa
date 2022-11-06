<div class="detail-abouts">
	<div class="container d-flex justify-content-between flex-wrap">
		<div class="left">
			<div class="title-left">About archqa</div>
			<?=$func->ShowMenuMutil("about","news",@$config["theme"]["about"]['lv'],$id);?>
			<?php if ($goichochungtoi['noidung']) {?>
				<div class="info-left">
					<span>Gọi cho chúng tôi</span>
					<div class="desc">
						<?=htmlspecialchars_decode($goichochungtoi['noidung'])?>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="right">
			<?php include TEMPLATE.LAYOUT."breadcrumb.php"; ?>
			<div class="content rp-images"><?=htmlspecialchars_decode($row_detail['noidung'.$lang])?></div>
			<div class="share">
				<b><?=chiase?>:</b>
				<div class="social-plugin w-clear">
					<div class="addthis_inline_share_toolbox_qj48"></div>
					<div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		</div>
	</div>
</div>