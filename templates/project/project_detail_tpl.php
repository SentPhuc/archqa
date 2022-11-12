<div class="box-detail pt30">
	<div class="container">
		<div class="box-detail-content project d-flex align-items-start justify-content-between flex-wrap">
			<div class="item__col">
				<h3 class="name"><?=$row_detail['ten'.$lang]?></h3>
				<div class="info">
					<?php if (!empty($row_detail['address'])) {?>
						<span><?=$row_detail['address']?></span>
					<?php } ?>
					<?php if (!empty($row_detail['units'])) {?>
						<span><?=$row_detail['units']?> đơn vị</span>
					<?php } ?>
					<?php if (!empty($row_detail['year'])) {?>
						<span><?=$row_detail['year']?></span>
					<?php } ?>
				</div>
				<hr>
				<?php if (!empty($row_detail['mota'.$lang])) {?>
					<div class="desc"><?=htmlspecialchars_decode($row_detail['mota'.$lang])?></div>
				<?php } ?>
				<a class="btn-quote transiton" href="contact">Đăng ký nhận báo giá</a>
				<hr class="mt-3 mb-3">
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
			<div class="item__col slick__page" :show='1' :autoplay='true'>
				<a class="thumb-detail" data-fancybox='thumb-detail' href="<?=UPLOAD_PROJECT_L.$row_detail['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
					<img onerror="this.src='<?=THUMBS?>/580x410x2/assets/images/noimage.png';" src="<?=THUMBS."/580x410x1/".UPLOAD_PROJECT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten'.$lang]?>">
				</a>
				<?php foreach($gallery as $v) { ?>
					<a class="thumb-detail" data-fancybox='thumb-detail' href="<?=UPLOAD_PROJECT_L.$v['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
						<img onerror="this.src='<?=THUMBS?>/580x410x2/assets/images/noimage.png';" src="<?=THUMBS."/580x410x1/".UPLOAD_PROJECT_L.$v['photo']?>" alt="<?=$row_detail['ten'.$lang]?>">
					</a>
				<?php } ?>
			</div>
		</div>
		<div class="tabs-detail mt-5">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link text-uppercase text-secondary active show" id="info-product-tab" data-toggle="tab" href="#info-product" role="tab" aria-controls="info-product" aria-selected="true">Thông tin chi tiết</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-uppercase text-secondary" id="quality-product-tab" data-toggle="tab" href="#quality-product" role="tab" aria-controls="quality-product" aria-selected="false">Chất lượng cao</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-uppercase text-secondary" id="string-product-tab" data-toggle="tab" href="#string-product" role="tab" aria-controls="string-product" aria-selected="false">Chuỗi cung ứng toàn cầu</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane rp-images fade show active" id="info-product" role="tabpanel" aria-labelledby="info-product-tab">
					<?=(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') ? htmlspecialchars_decode($row_detail['noidung'.$lang]) : ''?>
				</div>
				<div class="tab-pane fade" id="quality-product" role="tabpanel" aria-labelledby="quality-product-tab">
					<?=(isset($row_detail['chatluongcao'.$lang]) && $row_detail['chatluongcao'.$lang] != '') ? htmlspecialchars_decode($row_detail['chatluongcao'.$lang]) : ''?>
				</div>
				<div class="tab-pane fade" id="string-product" role="tabpanel" aria-labelledby="string-product-tab">
					<?=(isset($row_detail['chuoicungungtoancau'.$lang]) && $row_detail['chuoicungungtoancau'.$lang] != '') ? htmlspecialchars_decode($row_detail['chuoicungungtoancau'.$lang]) : ''?>
				</div>
			</div>
		</div>
		<div class="text-center btn-back">
			<a href="project" title="Quay lại dự án">Quay lại dự án</a>
		</div>
	</div>
	<div class="pd70-0 mt-5 background-gray">
		<div class="container">
			<?php include TEMPLATE.LAYOUT."form_getquote.php"; ?>
		</div>
	</div>
	<div class="projectOther pt70">
		<div class="container">
			<div class="title-website title-viewsMore">
				<span>Xem thêm các dự án</span>
			</div>
			<?php if(isset($project) && count($project) > 0) { ?>
				<div class="row__item slick__page slick__page-themeArraw" :show="4" :autoplay="true" :arrows="true" :lg-item="4" :md-item="3" :sm-item="2" :xs-item="1">
					<?php $funcLayout->setTbl('project');?>
					<?php $funcLayout->setClass('item__project item'); ?>
					<?php $funcLayout->setHvr('scale-img');?>
					<?php $funcLayout->infoTheme('project');?>
					<?php $funcLayout->setVarible($project);?>
					<?php $funcLayout->setType("project");?>
					<?php $funcLayout->setImage($config['theme'][$type]['dir'], $config['theme'][$type]['column'], $config['theme'][$type]['size']);?>
					<?php $funcLayout->getTheme(); ?>
				</div>
			<?php } else { ?>
				<div class="alert alert-warning mt-3" role="alert">
					<strong><?=khongtimthayketqua?></strong>
				</div>
			<?php } ?>
		</div>
	</div>
</div>