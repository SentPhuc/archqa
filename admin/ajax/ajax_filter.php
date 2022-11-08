<?php
include "ajax_config.php";

if(isset($_POST["id"]))
{
	$id = (isset($_POST["id"])) ? htmlspecialchars($_POST["id"]) : 0;
	$type = (isset($_POST["type"])) ? htmlspecialchars($_POST["type"]) : '';
	$row = null;

	if($id)
	{
		$getList = $d->rawQueryOne("select id_filter from #_product_list where id = '".$id."' and type = '".$type."' order by stt,id desc");
	}
}
?>

<?php if (!empty($getList['id_filter'])) {?>
	<?php foreach (explode(',',$getList['id_filter']) as $keys => $values) {
		$typeFilter = null;
		if (!empty($values)) {
			$typeFilter = $func->isArrayFilter('type')[$values];
		}
		$filter = $d->rawQuery("select tenvi, id from #_product where type = '".$typeFilter."' order by stt,id desc");
		?>
		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Danh mục filter <?=$func->isArrayFilter()[$values] ?></h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group-category row">
					<?php foreach ($filter as $key1 => $value1) {
						$getidFilter = $d->rawQueryOne("select id_filter from #_filter where id_pro = '".$id."' and id_list_filter = '".$values."' and id_filter = '".$value1['id']."'");
						?>
						<div class="form-group col-xl-4 col-sm-4 mb-1">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" <?=($value1['id']==$getidFilter['id_filter']) ? "checked":""?> type="radio" id="filter-<?=$value1['id']?>" value="<?=$value1['id']?>" name="filter_group[<?=$values?>][items]">
								<input type="hidden" value="<?=$values?>" name="filter_group[<?=$values?>][list]">
								<label class="ml-1 custom-control-label" for="filter-<?=$value1['id']?>"><?=$value1['tenvi']?></label>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>