<?php

namespace View\Component;




class Comment1 extends Base
{



    public function new(): Base{
        return new self('comment-1');
    }




    protected function html($data): void{
        // TODO: Implement html() method.
    }




    protected function css(): void{
        // TODO: Implement css() method.
    }




    protected function javascript(): void{
        // TODO: Implement javascript() method.
    }



}