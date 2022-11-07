<div class="wrap-project_estimation">
	<div class="container">
		<div class="title-website">
			<span>Hãy bắt đầu giải pháp đầy đủ một ngôi nhà ngay bây giờ!</span>
		</div>
		<div class="btn-project_estimation text-center">
			<a href="dowload-catalog" title="Dowload catalog">Dowload catalog</a>
			<a href="contact" title="Nhận báo giá miễn phí">Nhận báo giá miễn phí</a>
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
					<input value="<?=!empty($width) ? $width : ''?>" type="text" name="width" placeholder="Nhập chiều rộng" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="longs">Chiều dài “ Ví dụ 10.5m” :</label>
					<input value="<?=!empty($longs) ? $longs : ''?>" type="text" name="longs" placeholder="Nhập chiều dài" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="floor">Số tấng “ Trừ tum, lửng ”:</label>
					<input value="<?=!empty($floor) ? $floor : ''?>" type="text" name="floor" placeholder="Nhập số tầng" class="form-control" required>
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
					<input type="text" value="<?=!empty($mezzanine) ? $mezzanine : ''?>" name="mezzanine" placeholder="Nhập diện tích" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="rooftop">Tum “ Tầng Thượng ” “Ví dụ 30m2 ”:</label>
					<input value="<?=!empty($rooftop) ? $rooftop : ''?>" type="text" name="rooftop" placeholder="Nhập diện tích" class="form-control" required>
				</div>
				<div class="input-project_estimation">
					<label for="id_santhuong">Sân thượng:</label>
					<?=$func->get_select_categoryNodata('news','id_santhuong','santhuong',@$id_santhuong,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_bancong">Ban công:</label>
					<?=$func->get_select_categoryNodata('news','id_bancong','bancong',@$id_bancong,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_loaimong">Móng:</label>
					<?=$func->get_select_categoryNodata('news','id_loaimong','loaimong',@$id_loaimong,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_tangham">Tầng hầm:</label>
					<?=$func->get_select_categoryNodata('news','id_tangham','tangham',@$id_tangham,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="id_mai">Mái:</label>
					<?=$func->get_select_categoryNodata('news','id_mai','mai',@$id_mai,false,true,false)?>
				</div>
				<div class="input-project_estimation">
					<label for="garden">Sân vườn “ Ví dụ 30m2 ”:</label>
					<input value="<?=!empty($garden) ? $garden : ''?>" type="text" name="garden" placeholder="Nhập diện tích" class="form-control" required>
				</div>
			</div>
			<button class="submit-project_estimation" type="submit" name="projectEstimation" value="true">Tính kết quả</button>
		</form>
		<?php if (!empty($dataEstimation)) {?>
			<div class="info">
				<div class="estimated__results mt-4">
					<h5 class="mb-4 text-capitalize">
						<strong>
							Bạn cần xây dựng <?=@$getLoaiCongTrinh['ten']?> <?=@$getMattien['ten']?> với loại hình dịch vụ <?=@$getDichvuxaynha['ten']?> và mức đầu tư <?=@$getMucdautu['ten']?> diện tích xây dựng là <?=$width?>Mx<?=$longs?>M
						</strong>
					</h5>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="4" class="text-center"><h4 class="text-capitalize">Đơn giá <?=@$getDichvuxaynha['ten']?></h4></th>
								</tr>
							</thead>
							<tdbody>
								<tr>											
									<td colspan="4" class="text-right"><strong class="text-uppercase"> ĐƠN GIÁ: <?=$func->format_money($gia)?></strong></td>
								</tr>
								<tr class="tieude_table">
									<td class="text-center"><strong>STT</strong></td>
									<td><strong>LOẠI</strong></td>
									<td><strong>DIỆN TÍCH XD</strong></td>
									<td><strong>THÀNH TIỀN</strong></td>
								</tr>
								<?php
								$totalDientich = 0;
								$total = 0;
								foreach ($data as $key => $value) {
									$totalDientich += $value['dientich']; 
									$total += $value['thanhtien']; 
									?>
									<tr>
										<td class="text-center"><?=$key+1?></td>
										<td><?=$value['ten']?></td>
										<td><?=$value['dientich']?> m2</td>
										<td class="text-uppercase"><?=$func->format_money($value['thanhtien'])?></td>
									</tr>
								<?php } ?>
								<tr>
									<td colspan="3" class="text-right">
										<strong>Tổng diện tích:</strong>
									</td>
									<td><strong><?=$totalDientich?> m2</strong></td>
								</tr>
								<tr>
									<td colspan="3" class="text-right">
										<strong>Tổng chi phí:</strong>
									</td>
									<td><strong class="text-uppercase"><?=$func->format_money($total + $priceOther)?></strong></td>
								</tr>
							</tdbody>
						</table>
					</div>
				</div>
				<div class="pt-4"><?=htmlspecialchars_decode($detailDutoan['mota'])?></div>
			</div>
		<?php }else{?>
			<?php if ($source!='index') {?>
				<div class="alert alert-warning mt-3" role="alert">
					<strong>Giá trị diện tích không tồn tại</strong>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>