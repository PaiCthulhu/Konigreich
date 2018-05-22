<?php
namespace Konigreich;

use AdmBereich\Controller;

class Main extends Controller{

    function index(){
        dump(NPC::make());
        echo '<ul>';
        Console::render();
        echo '</ul>';
    }

    function _error($error){
        dump($error);
    }
}