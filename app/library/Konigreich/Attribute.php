<?php
namespace Konigreich;

class Attribute {

    /**
     * @var string $name
     * @var string $key
     * @var int $value
     * @var int $mod
     * @var string $abbv
     * @var bool $nullable
     */
    protected $name, $key, $value, $mod, $abbv, $nullable;

    function __construct($key, $values = []){
        $this->key = $key;
        $this->name = $values['name'] ?? $key;
        $this->abbv = $values['abbv'] ?? $key;
        $this->nullable = $values['null'] ?? false;
    }

    function abbreviation($abbv = null){
        if(isset($abbv) && is_string($abbv))
            $this->abbv = $abbv;
        return $this->abbv;
    }

    function setValue($value){
        if(!isset($value) && !$this->nullable)
            throw new \Exception('Valor deve ser setado!');
        if(is_string($value) && ctype_digit($value))
            $value =  (int) $value+0;
        if(!is_int($value))
            throw new \Exception('Valor "'.$value.'" não é um valor válido');
        $this->value = $value;
        $this->mod = $this->mod();
        return $this;
    }

    function rollValue($method){
        Console::log('Rolando atributo "'.$this->name.'"');
        $value = RollMethod::roll($method);
        Console::log('Resultado: '.$value);
        return $this->setValue($value);
    }

    private function val(){
        return $this->value;
    }

    private function mod(){
        return floor(($this->val() - 10)/2);
    }

}