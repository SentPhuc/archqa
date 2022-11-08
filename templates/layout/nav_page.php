<?php if (count($catNav) > 0 || count($listNav) > 0) {?>
	<div class="main-navPage">
		<div class="container">
			<?php if (count($listNav) > 0) {?>
				<div class="nav-list classper <?=$type?>">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide ">
								<a class="text-decoration-none transition <?=($idlActive==null ? 'active':'')?>" href="<?=$com?>" title="Tất cả">
									<span class="img">
										<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=THUMBS."/24x24x1/"?>assets/images/icon-all.png" alt="Tất cả">
										<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=THUMBS."/24x24x1/"?>assets/images/icon-all-active.png" alt="Tất cả">
									</span>
									Tất cả
								</a>
							</div>
							<?php foreach ($listNav as $key => $value) {
								$pathContant = UPLOAD_NEWS_L;
								if ($type=='product') {
									$pathContant = UPLOAD_PRODUCT_L;
								}
								$classActiveList = '';
								if (@$idlActive == $value['id']) {
									$classActiveList = 'active';
								}else if($idl == $value['id']){
									$classActiveList = 'active';
								}
								?>
								<div class="swiper-slide">
									<a class="text-decoration-none transition <?=$classActiveList?>" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>">
										<?php if (!empty($value['photo1'])) {?>
											<span class="img">
												<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=THUMBS."/24x24x2/".$pathContant.$value['photo1']?>" alt="<?=$value['ten']?>">
												<img onerror=src="<?=THUMBS."/24x24x1/"?>assets/images/noimage.png" src="<?=THUMBS."/24x24x2/".$pathContant.(!empty($value['photo2']) ? $value['photo2'] : $value['photo1'])?>" alt="<?=$value['ten']?>">
											</span>
										<?php } ?>
										<?=$value['ten']?>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
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