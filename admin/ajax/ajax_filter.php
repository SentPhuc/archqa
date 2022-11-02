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
		if (!empty($getList['id_filter'])) {
			$row = $d->rawQuery("select tenvi, id from #_product where id_list in (".$getList['id_filter'].") and type = 'filter-product' order by stt,id desc");
		}
	}

	$str = '';
	if($row)
	{
		foreach($row as $v)
		{
			$str .= '<div class="form-group col-xl-4 col-sm-4">';
			$str .= '<input type="checkbox" id="filter-'.$v['id'].'" value="'.$v['id'].'" name="filter_group[]">';
			$str .= '<label class="ml-1" for="filter-'.$v['id'].'">'.$v['tenvi'].'</label>';
			$str .= '</div>';
		}
	}
	echo $str;
}
?>