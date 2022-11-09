<!DOCTYPE html>
<html lang="<?=$config['website']['lang-doc']?>">
<head>
    <?php include TEMPLATE.LAYOUT."head.php"; ?>
    <?php include TEMPLATE.LAYOUT."bundle_css.php"; ?>
</head>
<!-- get type and css for template view-template-$type -->
<body class="view-template-<?=@$type?> <?=!empty($idl) ? 'isList':''?>">
    <?php
    include TEMPLATE.LAYOUT."seo.php";
    include TEMPLATE.LAYOUT."menu.php";
    if($source=='index') include TEMPLATE.LAYOUT."slide.php";
    else if($template!='news/ideas_detail') include TEMPLATE.LAYOUT."banner.php";
    if($template!='news/about_detail' && ($template!='project/project' && @$idl!=0)) include TEMPLATE.LAYOUT."breadcrumb.php";
    ?>
    <?php
    include TEMPLATE.$template."_tpl.php";
    include TEMPLATE.LAYOUT."footer.php";
    include TEMPLATE.LAYOUT."mmenu.php";
    include TEMPLATE.LAYOUT."modal.php";
    include TEMPLATE.LAYOUT."bundle_js.php";
        // if($deviceType=='mobile') include TEMPLATE.LAYOUT."phone.php";
    ?>
</body>
</html>