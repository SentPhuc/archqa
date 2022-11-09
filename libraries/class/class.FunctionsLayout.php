<?php
class FunctionsLayout extends Functions
{
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function setTbl($tbl)
    {
        $this->tbl = $tbl;
    }
    public function setClass($class)
    {
        $this->class = $class;
    }
    public function setHvr($hvr)
    {
        $this->hvr = $hvr;
    }
    public function setVarible($varible)
    {
        $this->varible = $varible;
    }
    public function infoTheme($theme) {
        $this->theme = $theme;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function setImage($dir, $image, $resize)
    {
        $this->dir = $dir;
        $this->image = $image;
        $this->resize = $resize;
    }
    public function getTheme()
    {
        return $this->theme();
    }
    private function theme()
    {
        global $config,$login_member;
        foreach($this->varible as $i => $item) { ?>
            <div class="<?=$this->class?>">
                <div class="img">
                    <a class="text-decoration-none <?=$this->hvr?>" href="<?=(!empty($item["tenkhongdau"]))?$item["tenkhongdau"]:"javascript:;"?>" title="<?=$item['ten']?>">
                        <?=$this->get_photo_static("",$this->resize,false,$this->dir.$item[$this->image]);?>
                    </a>
                    <?php if (@$config['order']['cart']==true && $this->theme=="san-pham") {?>
                        <a class="transition addcart addcart-home text-decoration-none" data-id="<?=$item['id']?>" data-action="addnow"><i class="fas fa-cart-plus"></i><span>Thêm</span></a>
                    <?php } ?>
                    <?php if ($this->theme=="san-pham") {?>
                        <div class="btn-event transition">
                            <div class="info">
                                <a data-id="<?=$item['id']?>" data-event="like" data-table="<?=$this->tbl?>" data-type="<?=$this->type?>" class="handle-event text-decoration-none" href="javascript:;" title="Like">
                                    <img src="assets/images/icon14.png" alt="">
                                    <span class="couter-like"><?=(!empty($item["countLike"]))?$item["countLike"]:0?></span>
                                </a>
                                <a data-id="<?=$item['id']?>" data-user="<?=!empty($_SESSION[$login_member]['id']) ? $_SESSION[$login_member]['id'] : 0?>" data-event="save" data-table="<?=$this->tbl?>" data-type="<?=$this->type?>" class="handle-event text-decoration-none" href="javascript:;" title="Save">
                                    <img src="assets/images/icon15.png" alt="">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="info">
                    <h3>
                        <a class="text-decoration-none name line-1" href="<?=(!empty($item["tenkhongdau"]))?$item["tenkhongdau"]:"javascript:;"?>" title="<?=$item['ten']?>">
                            <?=$item['ten']?>
                        </a>
                    </h3>
                    <?php if ($this->theme=="san-pham") {?>
                        <?php /*
                            <p class="price-product">
                            <?php if(!empty($item['giamoi'])) { ?>
                                <span class="price-new"><?=$this->format_money(@$item['giamoi'])?></span>
                                <span class="price-old"><?=$this->format_money(@$item['gia'])?></span>
                            <?php } else { ?>
                                <span class="price-new"><?=(!empty($item['gia'])) ? $this->format_money(@$item['gia']) : lienhe?></span>
                            <?php } ?>
                        </p>
                        */ ?>
                        <?php if(!empty($item['masp'])) { ?>
                            <span class="masp"><?=$item["masp"]?></span>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($this->theme=="news") {?>
                        <?php if (!empty($item['mota'])) {?>
                            <div class="desc line-3">
                                <?=htmlspecialchars_decode($item['mota'])?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }
    private function getType()
    {
        global $type;
        return (isset($this->type)) ? $this->type : $type;
    }
}
?>