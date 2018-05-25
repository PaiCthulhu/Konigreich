<?php
namespace Konigreich;

use AdmBereich\Controller;

class Main extends Controller{

    function index(){
        $char = NPC::make();
        $char->statBlock();
        dump($char);
        echo '<ul>';
        Console::render();
        echo '</ul>';
    }

    function _error($error){
        dump($error);
    }
}