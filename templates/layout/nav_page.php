<div class="main-navPage">
	<div class="container">
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