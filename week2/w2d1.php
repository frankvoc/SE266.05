<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php


class Character{

    private $playername;
    private  static $playercount;
    public function __construct($p)
    {
        echo 'codsuks';
        $this->playername = $p;
        
    }
    public function setPlayerName($p)
    {
        $this->playername = $p;
    }
    public function getPlayerName()
    {
        return $this->playername;
    }
    public static function getPlayerCount(){
        return self::$playercount;
    }

}
$player1 = new Character("codsucks");
echo "<br>";
echo $player1->getPlayerName();
echo "<br>";
echo "Playercount" .Character::getPlayerCount();

class Wizard extends Character{
    private $attack;
    private $defense;
    private $magic;
    public function __construct($p, $a, $d, $m)
    {
        
        
    }
}
?>