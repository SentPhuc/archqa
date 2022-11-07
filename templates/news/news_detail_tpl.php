<div class="container pt-4 pb-4">
    <div class="title-website"><span><?=$row_detail['ten'.$lang]?></span></div>
    <div class="time-main"><i class="fas fa-calendar-week"></i><span><?=ngaydang?>: <?=date("d/m/Y h:i A",$row_detail['ngaytao'])?></span></div>
    <?php if(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') { ?>
        <div class="content-main rp-images w-clear"><?=htmlspecialchars_decode($row_detail['noidung'.$lang])?></div>
        <?php include TEMPLATE.LAYOUT."social.php"; ?>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?=noidungdangcapnhat?></strong>
        </div>
    <?php } ?>
    <div class="share othernews">
        <b><?=baivietkhac?>:</b>
        <ul class="list-news-other">
            <?php if(isset($news) && count($news) > 0) { for($i=0;$i<count($news);$i++) { ?>
                <li><a class="text-decoration-none" href="<?=$news[$i]['tenkhongdau']?>" title="<?=$news[$i]['ten']?>">
                    <?=$news[$i]['ten']?> - <?=date("d/m/Y",$news[$i]['ngaytao'])?>
                </a></li>
            <?php } } ?>
        </ul>
        <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
    </div>
</div>