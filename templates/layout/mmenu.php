<div id="main-mmenu">
    <div class="search-mmenu">
        <div>
            <input type="text" name="keyword1" id="keyword1" placeholder="<?=nhaptukhoatimkiem?>" onkeypress="doEnter(event,'keyword1');"/>
            <p onclick="onSearch('keyword1');"><i class="fa fa-search"></i></p>
        </div>
    </div>
    <ul>
        <li class="pc-hide menu-parents">
            <a href="product" title="Sản phẩm">Sản phẩm</a>
            <?=$func->ShowMenuMutil("product","product",@$config["theme"]["product"]['lv']);?>
        </li>
        <li class="menu-parents">
            <a href="project" title="Dự án">Dự án</a>
            <?=$func->ShowMenuMutil("project","project",@$config["theme"]["project"]['lv']);?>
        </li>
        <li class="menu-parents">
            <a href="ideas-how-tos" title="Nguồn cảm hứng">Nguồn cảm hứng</a>
            <span class="action-menu"></span>
            <ul class="cat-category">
                <li class="link-category menu-parents">
                    <a href="videos" title="Videos">Videos</a>
                    <?=$func->ShowMenuMutil("videos","news",@$config["theme"]["videos"]['lv']);?>
                </li>
                <?php if ($aboutCamhung) {?>
                    <li><a href="<?=$aboutCamhung['tenkhongdau'] ?>" title="<?=$aboutCamhung['ten'] ?>"><?=$aboutCamhung['ten'] ?></a></li>
                <?php } ?>
                <li><a href="ideas-how-tos" title="Ý tưởng cách làm">Ý tưởng cách làm</a></li>
                <li><a href="dowload-catalog" title="Catalogue Download">Catalogue Download</a></li>
            </ul>
        </li>
        <li class="menu-parents">
            <a href="quality" title="Phẩm chất">Phẩm chất</a>
            <?=$func->ShowMenuMutil("quality","news",@$config["theme"]["quality"]['lv']);?>
            <ul class="cat-category">
                <?php if ($aboutPhamchat) {?>
                    <?php foreach ($aboutPhamchat as $key => $value) {?>
                        <li><a href="<?=$value['tenkhongdau'] ?>" title="<?=$value['ten'] ?>"><?=$value['ten'] ?></a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </li>
        <li class="menu-parents">
            <a href="about" title="Giới thiệu">Giới thiệu</a>
            <?=$func->ShowMenuMutil("about","news",@$config["theme"]["about"]['lv']);?>
        </li>
        <li class="pc-hide"><a href="dowload-catalog" title="Catalog">Catalog</a></li>
        <li><a href="du-toan-cong-trinh" title="Dự toán công trình">Dự toán công trình</a></li>
        <li class="pc-hide"><a href="lien-he" title="Liên hệ">Liên hệ</a></li>
    </ul>
</div>