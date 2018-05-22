<?php
namespace Konigreich;

use DiceCalc\Calc;

class RollMethod {

    const   STANDARD = 1,
            CLASSIC = 2,
            HEROIC = 3,
            DICE_POOL = 4,
            PURCHASE = 5;

    static function roll($method){
        $self = new static();
        switch ($method){
            case static::STANDARD:
                return $self->standardRoll();
                break;
            case static::CLASSIC:
                return $self->classicRoll();
                break;
            case static::HEROIC:
                return $self->heroicRoll();
                break;
        }
    }

    private function standardRoll(){
        $calc = new Calc("4d6 highest 3");
        Console::log($calc->infix());
        return $calc();
    }

    private function classicRoll(){
        $calc = new Calc("3d6");
        Console::log($calc->infix());
        return $calc();
    }

    private function heroicRoll(){
        $calc = new Calc("2d6+6");
        Console::log($calc->infix());
        return $calc();
    }

    /**
     * getRandomWeightedElement()
     * Utility function for getting random values with weighting.
     * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
     * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
     * The return value is the array key, A, B, or C in this case.  Note that the values assigned
     * do not have to be percentages.  The values are simply relative to each other.  If one value
     * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
     * chance of being selected.  Also note that weights should be integers.
     *
     * @param array $weightedValues
     * @return mixed
     */
    static function getRandomWeightedElement(array $weightedValues) {
        $rand = mt_rand(1, (int) array_sum($weightedValues));

        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }

}