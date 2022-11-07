<div class="news-detail ideas-detail">
	<div class="container d-flex align-items-start justify-content-between flex-wrap">
		<div class="left">
			<span>Bạn cũng có thể thích</span>
			<div class="box">
				<?php foreach ($news as $key => $value) {?>
					<a class="text-decoration-none item__ideas-left" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>">
						<div class="img scale-img">
							<img onerror=src="<?=THUMBS."/340x230x1/"?>assets/images/noimage.png" src="<?=THUMBS."/340x230x1/".UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
						</div>
						<h3 class="name line-1">
							<?=$value['ten']?>
						</h3>
					</a>
				<?php } ?>
			</div>
		</div>
		<div class="right">
			<div class="title-website"><span><?=$row_detail['ten'.$lang]?></span></div>
			<div class="header__ideas d-flex align-items-center justify-content-center flex-wrap">
				<span class="date"><?=date('d \T\h\á\n\g m \N\ă\m Y',$row_detail['ngaytao'])?></span>
				<span class="count-views"><?=$row_detail['luotxem']?></span>
				<?php include TEMPLATE.LAYOUT."social.php"; ?>
				<?php if(isset($row_detail['mota'.$lang]) && $row_detail['mota'.$lang] != '') { ?>
					<div class="desc w-100">
						<?=htmlspecialchars_decode($row_detail['mota'.$lang])?>
					</div>
				<?php } ?>
			</div>
			<?php if(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') { ?>
				<div class="content-main rp-images w-clear"><?=htmlspecialchars_decode($row_detail['noidung'.$lang])?></div>
			<?php } else { ?>
				<div class="alert alert-warning" role="alert">
					<strong><?=noidungdangcapnhat?></strong>
				</div>
			<?php } ?>
			<div class="text-center btn-back">
				<a href="javascript:;" onclick="history.go(-1);" title="Quay lại thư mục">Quay lại thư mục</a>
			</div>
			<?php if ($deviceType=="mobile") {?>
				<div class="share othernews">
					<b><?=baivietkhac?>:</b>
					<ul class="list-news-other">
						<?php if(isset($news) && count($news) > 0) { for($i=0;$i<count($news);$i++) { ?>
							<li><a class="text-decoration-none" href="<?=$news[$i]['tenkhongdau']?>" title="<?=$news[$i]['ten']?>">
								<?=$news[$i]['ten']?> - <?=date("d/m/Y",$news[$i]['ngaytao'])?>
							</a></li>
						<?php } } ?>
					</ul>
					<div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="pd70-0 mt-5">
		<div class="container">
			<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		</div>
	</div>
</div>