<?php
namespace Konigreich;

use DiceCalc\Calc;

class Humanoid extends Character implements Type {
    const MALE_NAMES = [],
          FEMALE_NAMES = [],
          GENDERS = [0=>['female', 'f', '♀'], 50=>['male','m','♂']],
          AGES = ['adult'=>0,'middle'=>0,'old'=>0,'venerable'=>0,'intuitive'=>'+0','self-taught'=>'+0','trained'=>'+0','maximum'=>'+0'],
          SIZE_MOD = 1,
          LANGUAGE = 'Common',
          BODY_TYPE = [
            'arms'=>2,
            'hands'=>2,
            'legs'=>2,
            'head'=>1
          ];

    public $speed;

    function __construct(){
        parent::__construct();

    }

    function baseSpeed(){
        $speed = (static::BODY_TYPE['legs'] + 1)/2;
        return static::SIZE_MOD * $speed;
    }

    function randomGender(){
        $genders = static::GENDERS;
        ksort($genders);

        Console::log('Rolando gênero');
        $calc = new Calc("1d%");
        Console::log($calc->infix());
        $value = $calc();

        foreach ($genders as $chance=>$gender){
            if($value > $chance)
                $g = $gender;
        }

        Console::log('Resultado: ('.$value.') '.$g[0]);
        $this->gender = $g[0];
        return $this;
    }

    static function generateRandomName($gender){
        if($gender == 'male')
            return static::MALE_NAMES[mt_rand(0,(sizeof(static::MALE_NAMES) - 1))];
        else if($gender == 'female')
            return static::FEMALE_NAMES[mt_rand(0,(sizeof(static::FEMALE_NAMES) - 1))];
        else
            return false;
    }

}