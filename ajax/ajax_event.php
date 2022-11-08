<?php
include "ajax_config.php";

$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
$event = (isset($_POST['event']) && $_POST['event'] !='') ? htmlspecialchars($_POST['event']) : '';
$table = (isset($_POST['table']) && $_POST['table'] !='') ? htmlspecialchars($_POST['table']) : '';
$type = (isset($_POST['type']) && $_POST['type'] !='') ? htmlspecialchars($_POST['type']) : '';

$getPro = $d->rawQueryOne("select countLike,countSave from #_".$table." where id = ? and type = ? and hienthi > 0 limit 0,1",array($id,$type));
var_dump($getPro);
?>