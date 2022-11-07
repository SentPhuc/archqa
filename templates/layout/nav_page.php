<?php if (count($catNav) > 0 || count($listNav) > 0) {?>
	<div class="main-navPage">
		<div class="container">
			<?php if (count($listNav) > 0) {?>
				<div class="nav-list <?=$type?>">
					<a class="text-decoration-none transition <?=($idlActive==null ? 'active':'')?>" href="<?=$com?>" title="Tất cả">
							<span class="img">
								<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=THUMBS."/24x24x1/"?>assets/images/icon-all.png" alt="Tất cả">
								<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=THUMBS."/24x24x1/"?>assets/images/icon-all-active.png" alt="Tất cả">
							</span>
							Tất cả
						</a>
					<?php foreach ($listNav as $key => $value) {
						$icon = THUMBS."/24x24x2/".UPLOAD_NEWS_L.$value['photo1'];
						$iconHover = THUMBS."/24x24x2/".UPLOAD_NEWS_L.(!empty($value['photo2']) ? $value['photo2'] : $value['photo1']);
						if ($type=='product') {
							$icon = THUMBS."/24x24x2/".UPLOAD_PRODUCT_L.$value['photo1'];
							$iconHover = THUMBS."/24x24x2/".UPLOAD_PRODUCT_L.(!empty($value['photo2']) ? $value['photo2'] : $value['photo1']);
						}
						$classActiveList = '';
						if (@$idlActive == $value['id']) {
							$classActiveList = 'active';
						}else if($idl == $value['id']){
							$classActiveList = 'active';
						}

						?>
						<a class="text-decoration-none transition <?=$classActiveList?>" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>">
							<span class="img">
								<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=$icon?>" alt="<?=$value['ten']?>">
								<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=$iconHover?>" alt="<?=$value['ten']?>">
							</span>
							<?=$value['ten']?>
						</a>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if (count($catNav) > 0) {
				$classActiveCatAll = '';
				if ($type=='product') {
					if ($idl > 0 && $idc > 0) {
						$classActiveCatAll = 'active';
					}else if($idl > 0){
						$classActiveCatAll = 'active';
					}
				}else if($idl==0 && $type!='product'){
					$classActiveCatAll = 'active';
				}
				?>
				<div class="nav-cat">
					<a class="text-decoration-none transition <?=$classActiveCatAll?>" href="<?=($type=='product')?$linkAllCat:'videos'?>" title="Tất cả">Tất cả</a>
					<?php foreach ($catNav as $key => $value) {
						$classActiveCat = '';
						if (@$idcActive == $value['id']) {
							$classActiveCat = 'active';
						}else if($idl == $value['id']){
							$classActiveCat = 'active';
						}
						?>
						<a class="text-decoration-none transition <?=$classActiveCat?>" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>"><?=$value['ten']?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>