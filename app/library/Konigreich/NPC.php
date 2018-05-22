<?php
namespace Konigreich;

class NPC {

    const RANKS = [
        'commoner'=>[
            'points'=>10,
            'age-dist'=>['child'=>32, 'intuitive'=>12,'self-taught'=>10,'trained'=>8,'middle'=>10,'old'=>14,'venerable'=>12,'elder'=>2]
        ],
        'standard'=>[
            'points'=>15,
            'age-dist'=>['child'=>16, 'intuitive'=>16,'self-taught'=>14,'trained'=>12,'middle'=>12,'old'=>14,'venerable'=>12,'elder'=>4]
        ],
        'hero'=>[
            'points'=>20,
            'age-dist'=>['child'=>4, 'intuitive'=>18,'self-taught'=>16,'trained'=>14,'middle'=>14,'old'=>16,'venerable'=>14,'elder'=>4]
        ],
        'legend'=>[
            'points'=>25,
            'age-dist'=>['child'=>2, 'intuitive'=>8,'self-taught'=>14,'trained'=>10,'middle'=>22,'old'=>18,'venerable'=>16,'elder'=>10]
        ],
    ];

    static function make(){
        $n = new Human();
        return $n;
    }
}