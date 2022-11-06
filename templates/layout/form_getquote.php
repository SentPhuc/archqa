<?php $splist = $d->rawQuery("select ten$lang as ten, id from #_product_list where type = ? and hienthi > 0 order by stt,id desc",array('product')); ?>
<div class="title_form_getquote">
	<span>Nhận báo giá miễn phí</span>
	<p><sup>*</sup>Vui lòng gửi cho chúng tôi chi tiết dự án và sơ đồ mặt bằng của bạn. Chúng tôi sẽ báo giá cho bạn trong vòng 24 giờ!</p>
</div>
<form class="form-getquote d-flex align-items-center justify-content-between flex-wrap validation-getquote" novalidate method="post" action="bao-gia" enctype="multipart/form-data">
	<div class="input-getquote w-100">
		<input type="text" name="data[ten]" placeholder="Họ và tên" class="form-control" required>
	</div>
	<div class="input-getquote">
		<input type="text" name="data[email]" placeholder="*Email" class="form-control" required>
	</div>
	<div class="input-getquote">
		<input type="text" name="data[dienthoai]" placeholder="*Số điện thoại" class="form-control" required>
	</div>
	<div class="input-getquote">
		<input type="text" name="data[city]" placeholder="*Thành phố" class="form-control" required>
	</div>
	<div class="input-getquote">
		<input type="text" name="data[diachi]" placeholder="*Địa chỉ" class="form-control" required>
	</div>
	<div class="input-getquote w-100">
		<label>Sản phẩm cần:</label>
		<div id="inputPreview">
			<?php foreach ($splist as $key => $value) {?>
				<input value="<?=$value['id']?>" name="data[product][]" id="product-<?=$value['id']?>" type="checkbox" class="css-checkbox">
				<label for="product-<?=$value['id']?>"><?=$value['ten']?></label>
			<?php } ?>
		</div>
	</div>
	<div class="input-getquote">
		<input type="text" name="data[qty]" placeholder="*Số lượng" class="form-control" required>
	</div>
	<div class="input-getquote">
		<label for="file">
			<span>File Upload</span>
			<div>
				<span>Chọn tệp</span>
				<span>Không có tệp nào được chọn</span>
			</div>
		</label>
		<input type="file" name="file" id="file" class="d-none">
	</div>
	<div class="input-getquote w-100">
		<textarea name="data[noidung]" placeholder="*Nội dung" class="form-control" required></textarea>
	</div>
	<div class="text-center w-100">
		<input type="submit" name="submit-getquote" value="Đăng ký ngay" disabled>
	</div>
	<input type="hidden" name="recaptcha_response_getquote" id="recaptchaResponseGetquote">
	<input type="hidden" name="data[type]" value="baogiamienphi">
	<input type="hidden" name="data[source]" value="<?=$type?>">
</form>