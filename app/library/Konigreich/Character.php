<?php
namespace Konigreich;

use AdmBereich\Controller;

abstract class Character {

    use Attributes;
    //use Skills;
    //use Traits;
    //use Feats;

    public $name, $race;

    function statBlock(){
        echo (new Controller())->render('statblock.default', ['char'=>$this]);
    }
}