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
        global $config;
        foreach($this->varible as $i => $item) { ?>
            <div class="<?=$this->class?>">
                <div class="img">
                    <a class="text-decoration-none <?=$this->hvr?>" href="<?=(!empty($item["tenkhongdau"]))?$item["tenkhongdau"]:"javascript:;"?>" title="<?=$item['ten']?>">
                        <?=$this->get_photo_static("",$this->resize,false,$this->dir.$item[$this->image]);?>
                    </a>
                    <?php if (@$config['order']['cart']==true && $this->theme=="san-pham") {?>
                        <a class="transition addcart addcart-home text-decoration-none" data-id="<?=$item['id']?>" data-action="addnow"><i class="fas fa-cart-plus"></i><span>Thêm</span></a>
                    <?php } ?>
                </div>
                <div class="info">
                    <h3>
                        <a class="text-decoration-none name line-1" href="<?=(!empty($item["tenkhongdau"]))?$item["tenkhongdau"]:"javascript:;"?>" title="<?=$item['ten']?>">
                            <?=$item['ten']?>
                        </a>
                    </h3>
                    <?php if ($this->theme=="san-pham") {?>
                        <p class="price-product">
                            <?php if(!empty($item['giamoi'])) { ?>
                                <span class="price-new"><?=$this->format_money(@$item['giamoi'])?></span>
                                <span class="price-old"><?=$this->format_money(@$item['gia'])?></span>
                            <?php } else { ?>
                                <span class="price-new"><?=(!empty($item['gia'])) ? $this->format_money(@$item['gia']) : lienhe?></span>
                            <?php } ?>
                        </p>
                    <?php } ?>
                    <?php if ($this->theme=="news") {?>
                        <?php if (!empty($item['mota'])) {?>
                            <div class="desc line-3">
                                <?=$item['mota']?>
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