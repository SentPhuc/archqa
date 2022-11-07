<?php if (count($catNav) > 0 || count($listNav) > 0) {?>
	<div class="main-navPage">
		<div class="container">
			<?php if (count($listNav) > 0) {?>
				<div class="nav-list">
					<?php foreach ($listNav as $key => $value) {
						$icon = THUMBS."/24x24x2/".UPLOAD_NEWS_L.$value['photo1'];
						$iconHover = THUMBS."/24x24x2/".UPLOAD_NEWS_L.(!empty($value['photo2']) ? $value['photo2'] : $value['photo1']);
						?>
						<a class="text-decoration-none transition <?=($idl == $value['id']) ? 'active':''?>" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>">
							<span class="img">
								<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=$icon?>" alt="<?=$value['ten']?>">
								<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=$iconHover?>" alt="<?=$value['ten']?>">
							</span>
							<?=$value['ten']?>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if (count($catNav) > 0) {?>
				<div class="nav-cat">
					<a class="text-decoration-none transition <?=($idl==0) ? 'active':''?>" href="videos" title="Tất cả">Tất cả</a>
					<?php foreach ($catNav as $key => $value) {?>
						<a class="text-decoration-none transition <?=($idl == $value['id']) ? 'active':''?>" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>"><?=$value['ten']?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>