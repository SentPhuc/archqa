<div class="box-static">
	<div class="container">
		<div class="title-website"><span><?=@$title_crumb?></span></div>
		<div class="form">
			<div class="box">
				<span>Điền vào để nhận danh mục mới nhất của chúng tôi miễn phí!</span>
				<form class="form-dowloadCatalog validation-getquote" novalidate method="post" action="bao-gia" enctype="multipart/form-data">
					<div class="input-dowloadCatalog">
						<label for="ten"><sup>*</sup> Họ tên</label>
						<div class="info">
							<input id="ten" type="text" name="data[ten]" placeholder="" class="form-control" required>
						</div>
					</div>
					<div class="input-dowloadCatalog">
						<label for="email"><sup>*</sup> Email</label>
						<div class="info">
							<input id="email" type="text" name="data[email]" placeholder="" class="form-control" required>
						</div>
					</div>
					<div class="input-dowloadCatalog">
						<label for="dienthoai"><sup>*</sup> Phone</label>
						<div class="info">
							<input id="dienthoai" type="text" name="data[dienthoai]" placeholder="" class="form-control" required>
						</div>
					</div>
					<div class="input-dowloadCatalog">
						<label for="city" for="ten"><sup>*</sup> Địa chỉ</label>
						<div class="info">
							<div class="item-col">
								<input id="city" type="text" name="data[city]" placeholder="" class="form-control" required>
								<label for="city" for="ten"><sup>*</sup> Thành phố</label>
							</div>
							<div class="item-col">
								<input id="district" type="text" name="data[district]" placeholder="" class="form-control" required>
								<label for="city" for="district"><sup>*</sup> Quận/huyện</label>
							</div>
						</div>
					</div>
					<div class="input-dowloadCatalog input-dowloadCatalog-start">
						<label><sup>*</sup> Sản phẩm</label>
						<div class="info">
							<div id="inputPreview">
								<?php foreach ($splist as $key => $value) {?>
									<input value="<?=$value['id']?>" name="data[product][]" id="product-<?=$value['id']?>" type="checkbox" class="css-checkbox">
									<label for="product-<?=$value['id']?>"><?=$value['ten']?></label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="input-dowloadCatalog">
						<label for="qty"><sup>*</sup> Số lượng</label>
						<div class="info">
							<input id="qty" type="text" name="data[qty]" placeholder="" class="form-control" required>
						</div>
					</div>
					<div class="input-dowloadCatalog input-dowloadCatalog-start">
						<label for="noidung"><sup>*</sup> Nội dung</label>
						<div class="info">
							<textarea id="noidung" name="data[noidung]" placeholder="" class="form-control" required></textarea>
							<p class="notis">
								Vui lòng điền vào kế hoạch chi tiết của bạn tại đây.
							</p>
						</div>
					</div>
					<div class="input-dowloadCatalog input-dowloadCatalog-start">
						<label for="file">
							<span><sup>*</sup> Chọn file</span>
						</label>
						<div class="info">
							<label class="btn-file" for="file">
								<span>Choose file</span>
							</label>
							<input type="file" name="file" id="file" class="d-none">
							<p class="notis">
								Vui lòng chia sẻ sơ đồ mặt bằng và hình ảnh nhà để được báo giá nhanh.
							</p>
						</div>
					</div>
					<div class="input-dowloadCatalog">
						<label for=""></label>
						<div class="info">
							<input class="btn-submit-dowloadCatalog" type="submit" name="submit-getquote" value="Đăng ký ngay" disabled>
						</div>
					</div>
					<input type="hidden" name="recaptcha_response_getquote" id="recaptchaResponseGetquote">
					<input type="hidden" name="data[type]" value="<?=$type?>">
					<input type="hidden" name="data[source]" value="">
				</form>
			</div>
		</div>
	</div>
</div>