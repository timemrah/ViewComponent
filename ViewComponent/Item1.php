<?php
namespace ViewComponent;




class Item1 extends Base
{



    protected function html($inner = null) : void{ ?>
<div class="title"><?=$this->data['title']?></div>
<div class="img-wrapper">
    <a href="<?=$this->data['src']?>" target="_blank"><img src="<?=$this->data['src']?>" /></a>
</div>
    <?php }




    protected function css():void{ ?>
<style rel="stylesheet">
.Item1{ margin: 10px; background-color: #EEE; padding: 10px; }
.Item1 .title{ color: #196bc2; margin: 0 0 10px 0; }
.Item1 .img-wrapper{ line-height: 0; }
.Item1 img{ height: 250px; }
</style>
    <?php }




    protected function javascript():void{

    }



}