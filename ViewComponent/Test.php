<?php

namespace ViewComponent;




class Test extends Base
{



    public function new($tagName): self{
        return new self($tagName);
    }




    protected function html($inner = null): void{
        // TODO: Implement html() method.
    }




    protected function css(): void{
        // TODO: Implement css() method.
    }




    protected function javascript(): void{
        // TODO: Implement javascript() method.
    }



}