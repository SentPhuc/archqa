<?php if(count($productList)) {?>
	<div class="wrap-category">
		<div class="container">
			<div class="title-website">
				<span>Thiết kế nội thất ngôi nhà</span>
				<p>Mọi thứ được bao phủ, Giải pháp độc quyền, Tính thẩm mỹ cao</p>
			</div>
			<div class="box">
				<?php foreach($productList as $value) { ?>
					<div class="item__category__product d-flex align-items-start justify-content-between flex-wrap">
						<div class="info">
							<div class="box">
								<span class="sub-title line-1"><?=$value['titlesub']?></span>
								<h3 class="name line-1"><?=$value['ten']?></h3>
								<div class="desc line-3"><?=htmlspecialchars_decode(strip_tags($value['mota']))?></div>
							</div>
							<a class="btn-all" href="<?=$value['tenkhongdau']?>" title="Khám phá các bộ sưu tập">Khám phá các bộ sưu tập</a>
						</div>
						<div class="img">
							<?=$func->get_photo_static("",THUMBS."/1010x600x1",false,UPLOAD_PRODUCT_L.$value['photo']);?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php if (count($project) > 0) {?>
	<div class="wrap-project">
		<div class="container">
			<div class="title-website">
				<span>Dựa án chúng tôi</span>
				<p>Nội thất ARCHQA và các sản phẩm khác đã phục vụ các gia đình và cộng đồng trên toàn thế giới. Khu dân cư và thương mại chúng tôi xử lý tất cả Duyệt qua phòng trưng bày dự án ARCHQA. Xem kết quả đẹp.</p>
			</div>
			<div class="text-center mb-4">
				<a class="btn-all" href="project" title="Khám phá tất cả dự án">Khám phá tất cả dự án</a>
			</div>
			<div class="oc-bn-wrap">
				<div class="swiper-container oc-bn">
					<div class="swiper-wrapper">
						<?php foreach ($project as $key => $value) {?>
							<div class="swiper-slide oc-s">
								<a class="oc-box" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>">
									<img loading="lazy" src="<?=THUMBS."/1010x600x1/".UPLOAD_PROJECT_L.$value['photo']?>" alt="<?=$value['ten']?>" class="oc-img">
								</a>
								<a class="oc-t line-1" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten']?>"><?=$value['ten']?></a>
							</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination"></div>
					<div class="oc-arrow oc-prev">
						<div class="oc-orange"></div>
						<div class="oc-gray"></div>
					</div>
					<div class="oc-arrow oc-next">
						<div class="oc-orange"></div>
						<div class="oc-gray"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php if (count($why) > 0) {?>
	<div class="wrap-why pd70-0">
		<div class="container">
			<div class="title-website">
				<span>Vì sao chọn chúng tôi</span>
				<p>Những lý do bạn nên chọn những dịch vụ thiết kế cũng như các sản phẩm nội thất bên công ty chúng tôi</p>
			</div>
			<div class="slick__page" :show="4" :lg-item="4" :md-item="3" :sm-item="2" :xs-item="1">
				<?php $funcLayout->setTbl('news');?>
				<?php $funcLayout->setClass('item__why');?>
				<?php $funcLayout->setHvr('scale-img');?>
				<?php $funcLayout->infoTheme("news");?>
				<?php $funcLayout->setVarible($why);?>
				<?php $funcLayout->setType('why');?>
				<?php $funcLayout->setImage(UPLOAD_NEWS_L, 'photo', THUMBS."/68x68x2");?>
				<?php $funcLayout->getTheme(); ?>
			</div>
		</div>
	</div>
<?php } ?>

<?php if (count($custumer) > 0) {?>
	<div class="wrap-custumer mt-5 pd40-0">
		<div class="container">
			<div class="title-website">
				<span>Khách hàng của chúng tôi nói gì</span>
			</div>
			<div class="slick__page" :show="1" :arrows="true">
				<?php foreach ($custumer as $key => $value) {?>
					<div class="item__custumer">
						<div class="desc">
							<span class="line-1"><?=$value['mota']?></span>
						</div>
						<h3 class="name line-1 mb-0"><?=$value['ten']?></h3>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php include TEMPLATE.LAYOUT."project_estimation.php"; ?>
<?php if(count($partner)) { ?>
	<div class="wrap-partner pd70-0">
		<div class="container">
			<div class="title-website">
				<span>Đối tác toàn cầu của chúng tôi</span>
				<p>Một số đối tác mà công ty chúng tôi đang hợp tác hiện nay trên thị trường mà có thể bạn quan tâm</p>
			</div>
			<?=$func->get_photo("doitac","160x100x1","slick__page text-center",':show="8" :lg-item="5" :md-item="4" :sm-item="3" :xs-item="2" :autoplay="true"'); ?>
		</div>
	</div>
	<?php } ?>