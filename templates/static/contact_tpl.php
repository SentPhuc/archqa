<div class="box-static">
	<div class="container">
		<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		<div class="top-contact">
			<div class="d-flex flex-wrap justify-content-between flex-wrap">
				<div class="item-col">
					<div class="title-info">Câu hỏi thường gặp</div>
					<div class="desc">
						Các câu hỏi thường gặp. <br> Tìm câu hỏi trả lời cho các câu hỏi phổ biến nhất của chúng tôi chỉ trong vài giây.
					</div>
					<a class="viewsMoreAll" href="cau-hoi-thuong-gap" title="Xem chi tiết">Xem chi tiết</a>
				</div>
				<div class="item-col">
					<div class="title-info">Liên hệ trực tiếp</div>
					<div class="desc"><?=htmlspecialchars_decode($lienhe['noidung'.$lang])?></div>
					<a class="viewsMoreAll" href="dowload-catalog" title="Xem chi tiết">Xem chi tiết</a>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-contact">
		<div class="map-contact container">
			<div class="title-info">Vị trí hiện tại</div>
			<div class="info">
				<a class="d-flex align-items-center justify-content-between flex-wrap text-decoration-none" target="_blank" href="<?=$optsetting['linkmap']?>" title="<?=$optsetting['diachi']?>">
					Địa chỉ: <?=$optsetting['diachi']?>
					<span class="viewsMoreAll mt-0">Xem tại google maps</span>
				</a>
			</div>
		</div>
	</div>
</div>