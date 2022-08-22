<?php
namespace ViewComponent;




class BoxWrapper1 extends Base
{




    public static function new($tagName = 'div'): self {
        return new self($tagName);
    }




    protected function html($inner = null):void{?>
<div class="title"><?=$this->data?></div>
<div class="items"><?php $inner(); ?></div>
    <?php }




    protected function css():void{ ?>
<style rel="stylesheet">
.BoxWrapper1{ background-color: #b0f1e1; padding: 15px; }
.BoxWrapper1 .title{ font-weight: bold; font-size: 26px; margin-bottom: 15px; }
.BoxWrapper1 .items{ display: flex; margin: 0 -10px; }
</style>
    <?php }




    protected function javascript():void{

    }



}