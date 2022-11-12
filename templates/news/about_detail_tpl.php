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
			<div class="social-plugin">
				<span>Chia sẻ với chúng tôi:</span>
				<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_button_linkedin"></a>
					<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
				</div>
			</div>
		</div>
		<div class="bottom">
			<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		</div>
	</div>
</div>