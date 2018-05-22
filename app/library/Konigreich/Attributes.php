<?php
namespace Konigreich;

trait Attributes {
    private $rollMethod;
    public $attributes = [];

    function __construct(){
        $this->rollMethod = ROLL_METHOD;
    }

    function setAttributes(){
        $list = Dict::ATTRIBUTES;
        foreach ($list as $key=>$field){
            $this->attributes[$key] = new Attribute($key, $field);
            $this->attributes[$key]->abbreviation($field['abbv']);
            $this->attributes[$key]->rollValue($this->rollMethod);
        }
    }
}