<?php
namespace Konigreich;

use DiceCalc\Calc;

class Human extends Humanoid implements Race{
    const MALE_NAMES = ["Aakif","Andrezi","Arasmes","Bahram","Baolo","Barid","Batsaikhan","Belor","Budi","Darvan","Dolok","Eilif","Garidan","Gellius","Hadzi","Hamengku","Harisko","Iacobus","Jaali","Jianguo","Kjell","Kousei","Kronug","Menas","Mitabu","Narsius","Nonek","Pateba","Pratavh","Qorchi","Ragnar","Rubani","Seckor","Shokamb","Shuo","Sunaki","Suryo","Tabansi","Teruawa","Thanh Liem","Toan Hao","Tomorbataar","Tuong Kinh","Ursion","Vachedi","Viorec","Yekskya","Zaiho","Zhen"],
          FEMALE_NAMES = ["Alerdene","Alinza","Aula","Bach Hien","Belka","Beshkee","Chammady","Chao","Do Quyen","Eshe","Eudomia","Gerda","Hiriko","Ilinica","Indah","Ingirt","Izora","Jalket","Jayazi","Kaede","Kalizama","Kamshi","Lestari","Leyli","Marisan","Me\u2019amesa","Meilin","Mirelinda","Mpaandi","Nalmida","Nanya","Narantuyaa","Ntisi","Pasara","Pontia","Que Xuan","Revhi","Runa","Sahba","Shirin","Shivkah","Sinkitah","Surenchinua","Udara","Umie","Valki","Waajida","Xemne","Xue","Zalika","Zova"],
          SURNAMES = ["Smith", "Johnson", "Williams", "Jones", "Brown", "Davis", "Miller", "Wilson", "Moore", "Taylor", "Anderson", "Thomas", "Jackson", "White", "Harris", "Martin", "Thompson", "Garcia", "Martinez", "Robinson", "Clark", "Rodriguez", "Lewis", "Lee", "Walker", "Hall", "Allen", "Young", "Hernandez", "King", "Wright", "Lopez", "Hill", "Scott", "Green", "Adams", "Baker", "Gonzales", "Nelson", "Carter"],
          GENDERS = [0=>['female', 'f', '♀'], 50=>['male','m','♂']],
          AGES = ['adult'=>15,'middle'=>35,'old'=>53,'venerable'=>70,'intuitive'=>'+1d4','self-taught'=>'+1d6','trained'=>'+2d6','maximum'=>'+2d20'],
          LANGUAGE = 'Common';

    public $name, $surname, $gender, $age;

    function __construct($params = []){
        parent::__construct();
        $this->race = 'Human';
        $this->setAttributes();
        $this->randomGender()->randName()->randomAge();
    }

    function randName(){
        $this->name = static::generateRandomName($this->gender);
        $this->surname = static::SURNAMES[mt_rand(0,(sizeof(static::SURNAMES) - 1))];
        return $this;
    }

    function randomAge(){
        $agedist = ['child'=>32, 'intuitive'=>12,'self-taught'=>10,'trained'=>8,'middle'=>10,'old'=>14,'venerable'=>12,'elder'=>2];
        $stage = RollMethod::getRandomWeightedElement($agedist);
        switch ($stage){
            case 'child':
                $age = mt_rand(0,Human::AGES['adult']);
                break;
            case 'intuitive': $roll = new Calc(Human::AGES['adult'].Human::AGES['intuitive']); $age = $roll(); break;
            case 'self-taught': $roll = new Calc(Human::AGES['adult'].Human::AGES['self-taught']); $age = $roll(); break;
            case 'trained': $roll = new Calc(Human::AGES['adult'].Human::AGES['trained']); $age = $roll(); break;
            case 'middle':
                $roll = new Calc(Human::AGES['adult'].Human::AGES['trained']);
                $min = $roll();
                $age = mt_rand($min,Human::AGES['middle']);
                break;
            case 'old':
                $age = mt_rand(Human::AGES['middle'],Human::AGES['old']);
                break;
            case 'venerable':
                $age = mt_rand(Human::AGES['old'],Human::AGES['venerable']);
                break;
            case 'elder':$roll = new Calc(Human::AGES['venerable'].Human::AGES['maximum']); $age = $roll(); break;
        }
        $this->age = $age;
        return $this;
    }
}