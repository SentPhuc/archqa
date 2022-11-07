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
			<?php include TEMPLATE.LAYOUT."social.php"; ?>
		</div>
		<div class="bottom">
			<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		</div>
	</div>
</div>