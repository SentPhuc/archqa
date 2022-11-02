<div class="header">
	<div class="header-top">
		<div class="container d-flex align-items-center justify-content-between">
			<p class="info-header"><?=@$slogan['ten'.$lang]?></p>
			<p class="info-header"><i class="fas fa-envelope"></i>Email: <?=$optsetting['email']?></p>
			<p class="info-header"><i class="fas fa-phone-square-alt"></i>Hotline: <?=$optsetting['hotline']?></p>
			<?=$func->get_photo("mangxahoi1","","social social-header",""); ?>
			<div class="lang-header">
	            <a href="ngon-ngu/vi/"><img src="assets/images/vi.jpg" alt="Tiếng Việt"></a>
	            <a href="ngon-ngu/en/"><img src="assets/images/en.jpg" alt="Tiếng Anh"></a>
	        </div>
	        <?php if(array_key_exists($login_member, $_SESSION) && $_SESSION[$login_member]['active'] == true) { ?>
	        	<div class="user-header">
		        	<a href="account/thong-tin">
		        		<span>Hi, <?=$_SESSION[$login_member]['username']?></span>
		        	</a>
		        	<a href="account/dang-xuat">
		        		<i class="fas fa-sign-out-alt"></i>
		        		<span><?=dangxuat?></span>
		        	</a>
		        </div>
	        <?php } else { ?>
	        	<div class="user-header">
		        	<a href="account/dang-nhap">
		        		<i class="fas fa-sign-in-alt"></i>
		        		<span><?=dangnhap?></span>
		        	</a>
		        	<a href="account/dang-ky">
		        		<i class="fas fa-user-plus"></i>
		        		<span><?=dangky?></span>
		        	</a>
		        </div>
	        <?php } ?>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container d-flex align-items-center justify-content-between">
			<?=$func->get_photo_static("logo",THUMBS."/120x100x2",true);?>
			<?=$func->get_photo_static("banner",THUMBS."/730x120x2",true);?>
			<a class="hotline-header">
				<p>Hotline hỗ trợ:</p>
				<span><?=$optsetting['hotline']?></span>
			</a>
		</div>
	</div>
</div>