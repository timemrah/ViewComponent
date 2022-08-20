<?php

namespace ViewComponent;

abstract class Base
{


    // VARIABLES :
    protected string $id, $groupName, $wrapperTagName;
    static protected array $componentGroup = [];

    private array
        $selectedComponentGroup,
        $uniqStyleCode = [],
        $attrs = [],
        $class = [];

    protected array | string | int $data = '';

    private static array $componentGroupDefaultFields = [
        'stylesheetImportStatus' => false,
        'stylesheetOnce'         => true,
        'scriptOnce'             => false,
        'scriptImportStatus'     => false
    ];



    // CONSTRUCTOR :
    public function __construct($cssClass, $tagName){

        $this->id        = uniqid('c-');
        $this->groupName = $cssClass;
        $this->wrapperTagName = $tagName;
        $this->class($cssClass);

        // Component group yönetimi ve seçilimi :
        // Aynı komponent için sayfaya defalarca aynı style kodlarının yazımını engellemek için
        if(empty(self::$componentGroup[$this->groupName])){
            self::$componentGroup[$this->groupName] = self::$componentGroupDefaultFields;
        }
        $this->selectedComponentGroup = &self::$componentGroup[$this->groupName];

    }



    // SHORTCUT OF NEW INSTANCE METHOD :
    public static function new($tagName = 'div'):self{
        $className = get_called_class();
        $classExp = explode('\\', $className);
        $cssName = end($classExp);
        return new $className($cssName, $tagName);
    }




    public function data($data):self{
        $this->data = $data;
        return $this;
    }




    public function put($inner = null):void{

        if(!$inner) $inner = fn() => false;

        $this->echoCss();
        $this->echoStyle();

        echo "<$this->wrapperTagName id=\"$this->id\" class=\"{$this->getAllClassStr()}\"{$this->getAttrsStr()}>";
        $this->html($inner);
        echo "</{$this->wrapperTagName}>";

        $this->javascript();
    }




    // CLASS :
    public function class($class): self {
        if(!is_array($class)){
            $class = [$class];
        }
        $this->class = array_merge($this->class, $class);
        return $this;
    }
    private function getAllClassStr(): string {
        if(!$this->class) return '';
        return implode(' ', $this->class);
    }




    // STYLE :
    public function style($css):self{
        if(!is_array($css)){
            $css = [$css];
        }
        $this->uniqStyleCode = array_merge($this->uniqStyleCode, $css);
        return $this;
    }
    /* style() metoduyla eklenen komponente özel css kodları varsa kodları sayfaya ekler */
    private function echoStyle():void{
        if(!$this->uniqStyleCode){ return; }

        echo '<style rel="stylesheet">';
        foreach($this->uniqStyleCode as $styleCode){
            echo "#{$this->id} $styleCode ";
        }
        echo "</style>";
    }
    /* Html içerisine css kodların eklenip eklenmeyeceğine karar vererek kodları ekler.
     * Aynı komponent gurubundan birden fazla komponent eklenmişse css kodları bir defa eklenir. */
    private function echoCss() : void{

        if(
            $this->selectedComponentGroup['stylesheetOnce'] &&
            $this->selectedComponentGroup['stylesheetImportStatus']
        ) return;

        $this->selectedComponentGroup['stylesheetImportStatus'] = true;
        $this->css();
    }




    // ATTRIBUTES :
    public function attr($keyValue):self{
        $this->attrs += $keyValue;
        return $this;
    }
    private function getAttrsStr():string{
        if(!$this->attrs) return '';

        $attrsStr = ' ';
        foreach($this->attrs as $key => $value){
            if(is_numeric($key)){
                $attrsStr .= "$value ";
                continue;
            }
            $attrsStr .= "$key=\"$value\" ";
        }
        if($attrsStr) $attrsStr = substr($attrsStr,0, -1);

        return $attrsStr;
    }




    // ABSTRACT :
    abstract protected function html($inner = null) : void;
    abstract protected function css() : void;
    abstract protected function javascript() : void;




}