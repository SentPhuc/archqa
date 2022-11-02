<?php
class UploadImages
{
	private $config;
	function __construct($config)
	{
		$this->config = $config;
	}
	public function getSize_photo($com,$type,$act,$attr)
	{
		@$imgType = $this->config[$com][$type]['img_type'];
		@$data = $this->config[$com][$type][$attr];
		$kind = $this->getSize_kind_UploadImages($act);
		if (strlen(strstr($data, "watermark")) > 0) {
			$data = str_replace("../watermark/".$type."/","",$data);
			$data = rtrim($data,"x1");
		}
		if ($com!="tags" && $kind!="brand") {
			$data = str_replace("../thumbs/","",$data);
			$data = rtrim($data,"x1");
		}
		if (($kind!="man" && $com!="static") || $kind=="brand") {
			@$data = $this->config[$com][$type][$attr.'_'.$kind];
			@$imgType = $this->config[$com][$type]['img_type_'.$kind];
		}
		if ($act=="photo_static") {
			@$data = $this->config[$com][$act][$type][$attr];
			@$imgType = $this->config[$com][$act][$type]['img_type'];
		}
		if ($com=="seopage") {
			@$data = $this->config[$com][$attr];
			@$imgType = $this->config[$com]['img_type'];
		}
		$data = 'Width - Height: '.$data.' px '.$imgType;
		return $data;
	}
	public function getSize_kind_UploadImages($act)
	{
		$kind = "";
		if ($act=="add" || $act=="edit" || $act=="capnhat" ) {
			$kind  = "man";
		}else if ($act=="add_brand" || $act=="edit_brand") {
			$kind  = "brand";
		}else if ($act=="add_mau" || $act=="edit_mau") {
			$kind  = "mau";
		}else{
			$arrayCategory = array("list","cat","item","sub");
			foreach ($arrayCategory as $key => $value) {
				if (strlen(strstr($act,$value)) > 0) {
					$kind  = $value;
					break;
				}
			}
		}
		return $kind;
	}
	public function getSize_dir_UploadImages($com,$act)
	{
		$derUpload = UPLOAD_PRODUCT;
		if ($com=="news" || $com=="static") {
			$derUpload = UPLOAD_NEWS;
		}else if($com=="project"){
			$derUpload = UPLOAD_PROJECT;
		}else if($com=="tags"){
			$derUpload = UPLOAD_TAGS;
		}else if($com=="seopage"){
			$derUpload = UPLOAD_SEOPAGE;
		}else if($com=="photo"){
			$derUpload = UPLOAD_PHOTO;
		}else if($com=="product" && ($act=="add_mau" || $act=="edit_mau")){
			$derUpload = UPLOAD_COLOR;
		}
		return $derUpload;
	}
}
?>