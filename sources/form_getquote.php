<?php 
if(!defined('SOURCES')) die("Error");
if(isset($_POST['submit-getquote']) || sset($_POST['submit-getquote-detail']))
{
	$responseCaptcha = $_POST['recaptcha_response_getquote'];
	$resultCaptcha = $func->checkRecaptcha($responseCaptcha);
	$scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
	$actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
	$testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

	if(($scoreCaptcha >= 0.5 && $actionCaptcha == 'getquote') || $testCaptcha == true)
	{
		$data = $_POST["data"];
		if(isset($_FILES["file"]))
		{
			$file_name = $func->uploadName($_FILES["file"]["name"]);
			if($file = $func->uploadImage("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', UPLOAD_FILE_L, $file_name))
			{
				$data['taptin'] = $file;
			}
		}

		if(isset($_FILES["file1"]))
		{
			$file1_name = $func->uploadName($_FILES["file1"]["name"]);
			if($file1 = $func->uploadImage("file1", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', UPLOAD_FILE_L, $file1_name))
			{
				$data['taptin'] = $file1;
			}
		}

		if(isset($data['product']) && ($data['product'] != '')) $data['product'] = implode(",", $data['product']);
			else $data['product'] = "";
		$data['ngaytao'] = time(); 
		$data['stt'] = 1;
		if ($d->insert('newsletter',$data)) {
			$func->transfer("Đăng thông tin thành công. Chúng tôi sẽ liên hệ với bạn sớm.",$config_base);
		}else{
			$func->transfer("Đăng thông tin thất bại. Vui lòng thử lại sau.",$config_base, false);
		}
	}else{
		$func->transfer("Bạn đang spam. Vui lòng thử lại sau 5 phút.",$config_base, false);
	}
}
?>