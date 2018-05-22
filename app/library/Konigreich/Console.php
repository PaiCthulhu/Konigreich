<?php
namespace Konigreich;

class Console {

    /**
     * @var Console $console Singleton
     */
    public static $console;

    private $logs = [];

    private function __clone(){ }
    private function __wakeup(){ }

    public static function self(){
        if(!isset(self::$console))
            self::$console = new self();

        return self::$console;
    }

    public static function log($info){
        Console::self()->logs[] = [date('Y-m-d h:i:s'),$info];
        return Console::self();
    }

    public static function render(){
        $cons = Console::self();
        foreach ($cons->logs as $log){
            echo "<li><span class='date'>{$log[0]} - </span>{$log[1]}</li>";
        }
    }

}