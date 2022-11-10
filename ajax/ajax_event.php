<?php
include "ajax_config.php";

$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
$user = (isset($_POST['user']) && $_POST['user'] > 0) ? htmlspecialchars($_POST['user']) : 0;
$event = (isset($_POST['event']) && $_POST['event'] !='') ? htmlspecialchars($_POST['event']) : '';
$table = (isset($_POST['table']) && $_POST['table'] !='') ? htmlspecialchars($_POST['table']) : '';
$type = (isset($_POST['type']) && $_POST['type'] !='') ? htmlspecialchars($_POST['type']) : '';
$data['status'] = 'error';
$data['message'] = ($event=='like') ? 'Like sản phẩm lỗi':'Lưu vào danh sách yêu thích lỗi';
$dataUpdate = [];

if ($event=='like') {
	$getPro = $d->rawQueryOne("select * from #_".$table." where id = '".$id."' and type = '".$type."' limit 0,1");
	$data['countLike'] = 0;
	$dataUpdate['countLike'] = $getPro['countLike'] + 1;
	$d->where('id', $id);
	$d->where('type', $type);
	if($d->update($table,$dataUpdate)){
		$data['status'] = 'success';
		$data['message'] = 'Like sản phẩm thành công';
		$data['countLike'] = $dataUpdate['countLike'];
	}
}

if ($event=='save') {
	$getPro = $d->rawQueryOne("select * from #_".$table." where id_pro = '".$id."' and id_user = '".$user."' and type = '".$type."' limit 0,1");
	if ($getPro['value'] > 0) {
		$d->rawQuery("delete from #_".$table." where id_pro = '".$id."' and id_user = '".$user."' and type = '".$type."'");
		$data['status'] = 'success';
		$data['message'] = 'Xóa danh sách yêu thích thành công';
	}else if($getPro['value']==0){
		$dataUpdate['value'] = 1;
		$dataUpdate['id_pro'] = $id;
		$dataUpdate['id_user'] = $user;
		$dataUpdate['type'] = $type;
		if($d->insert($table,$dataUpdate)){
			$data['status'] = 'success';
			$data['message'] = 'Lưu vào danh sách yêu thích thành công';
		}
	}
}
echo json_encode($data);
?>