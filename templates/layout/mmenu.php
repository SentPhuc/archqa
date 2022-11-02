<div id="main-mmneu">
    <ul>
        <li>
            <a href="project" title="Dự án">Dự án</a>
            <?=$func->ShowMenuMutil("project","project",@$config["theme"]["project"]['lv']);?>
        </li>
        <li>
            <a href="ideas-how-tos" title="Nguồn cảm hứng">Nguồn cảm hứng</a>
            <ul>
                <li>
                    <a href="videos" title="Videos">Videos</a>
                    <?=$func->ShowMenuMutil("videos","news",@$config["theme"]["videos"]['lv']);?>
                </li>
            </ul>
            <?php if ($aboutCamhung) {?>
                <li><a href="<?=$aboutCamhung['tenkhongdau'] ?>" title="<?=$aboutCamhung['ten'] ?>"><?=$aboutCamhung['ten'] ?></a></li>
            <?php } ?>
            <li><a href="ideas-how-tos" title="Ý tưởng cách làm">Ý tưởng cách làm</a></li>
            <li><a href="dowload-catalog" title="Catalogue Download">Catalogue Download</a></li>
        </li>
        <li>
            <a href="quality" title="Phẩm chất">Phẩm chất</a>
            <?=$func->ShowMenuMutil("quality","news",@$config["theme"]["quality"]['lv']);?>
            <ul>
                <?php if ($aboutPhamchat) {?>
                    <?php foreach ($aboutPhamchat as $key => $value) {?>
                        <li><a href="<?=$value['tenkhongdau'] ?>" title="<?=$value['ten'] ?>"><?=$value['ten'] ?></a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </li>
        <li>
            <a href="about" title="Giới thiệu">Giới thiệu</a>
            <?=$func->ShowMenuMutil("about","news",@$config["theme"]["about"]['lv']);?>
        </li>
    </ul>
</div>