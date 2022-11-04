<div class="wrap-project_estimation">
	<div class="container">
		<div class="title-website">
			<span>Hãy bắt đầu giải pháp đầy đủ một ngôi nhà ngay bây giờ!</span>
		</div>
		<div class="btn-project_estimation text-center">
			<a href="dowload-catalog" title="Dowload catalog">Dowload catalog</a>
			<a href="lien-he" title="Nhận báo giá miễn phí">Nhận báo giá miễn phí</a>
		</div>
		<div class="line-project_estimation"></div>
		<div class="header-project_estimation">
			<div class="title-website">
				<span>Dự toán công trình</span>
			</div>
			<div class="desc line-3">
				<?=htmlspecialchars_decode($motaDutoan['mota'])?>
			</div>
		</div>
		<form action="du-toan-cong-trinh">
			<span>Thông tin cơ bản</span>
			<div class="top-project_estimation d-flex align-items-start justify-content-between flex-wrap">
				<div class="input-project_estimation">
					<label for="id_loaicongtrinh">Chọn loại công trình:</label>
					<?=$func->get_select_categoryNodata('news','id_loaicongtrinh','loaicongtrinh',@$id_loaicongtrinh,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_dichvuxaynha">Dịch vụ xây nhà:</label>
					<?=$func->get_select_categoryNodata('news','id_dichvuxaynha','dichvuxaynha',@$id_dichvuxaynha,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_mucdautu">Mức đầu tư:</label>
					<?=$func->get_select_categoryNodata('news','id_mucdautu','mucdautu',@$id_mucdautu,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_mattien">Mặt tiền:</label>
					<?=$func->get_select_categoryNodata('news','id_mattien','mattien',@$id_mattien,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="width">Chiều rộng “ Ví dụ 2.5m” :</label>
					<input value="<?=!empty($width) ? $width : '10'?>" type="text" name="width" placeholder="Nhập chiều rộng" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="longs">Chiều dài “ Ví dụ 10.5m” :</label>
					<input value="<?=!empty($longs) ? $longs : '10.5'?>" type="text" name="longs" placeholder="Nhập chiều dài" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="floor">Số tấng “ Trừ tum, lửng ”:</label>
					<input value="<?=!empty($floor) ? $floor : '3'?>" type="text" name="floor" placeholder="Nhập số tầng" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="id_hem">Hẻm:</label>
					<?=$func->get_select_categoryNodata('news','id_hem','hem',@$id_hem,false,true,false)?>
				</div>
			</div>
			<span>Thông tin công năng</span>
			<div class="bottom-project_estimation d-flex align-items-start justify-content-between flex-wrap">
				<div class="input-project_estimation">
					<label for="mezzanine">Lửng “ Ví dụ 30m2 ”:</label>
					<input type="text" value="<?=!empty($mezzanine) ? $mezzanine : '30'?>" name="mezzanine" placeholder="Nhập diện tích" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="rooftop">Tum “ Tầng Thượng ” “Ví dụ 30m2 ”:</label>
					<input value="<?=!empty($rooftop) ? $rooftop : '30'?>" type="text" name="rooftop" placeholder="Nhập diện tích" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="id_santhuong">Sân thượng:</label>
					<?=$func->get_select_categoryNodata('news','id_santhuong','santhuong',@$id_santhuong,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_bancong">Ban công:</label>
					<?=$func->get_select_categoryNodata('news','id_bancong','bancong',@$item['id_bancong'],false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_loaimong">Móng:</label>
					<?=$func->get_select_categoryNodata('news','id_loaimong','loaimong',@$item['id_loaimong'],false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_tangham">Tầng hầm:</label>
					<?=$func->get_select_categoryNodata('news','id_tangham','tangham',@$item['id_tangham'],false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_mai">Mái:</label>
					<?=$func->get_select_categoryNodata('news','id_mai','mai',@$item['id_mai'],false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="garden">Sân vườn “ Ví dụ 30m2 ”:</label>
					<input value="<?=!empty($garden) ? $garden : '30'?>" type="text" name="garden" placeholder="Nhập diện tích" class="form-control" required>
				</div>
			</div>
			<button class="submit-project_estimation" type="submit" name="projectEstimation" value="true">Tính kết quả</button>
		</form>
		<?php if (!empty($dataEstimation)) {?>
			<div class="info"></div>
		<?php } ?>
	</div>
</div>