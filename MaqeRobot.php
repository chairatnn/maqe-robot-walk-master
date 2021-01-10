<?php
require_once('Robot.php');

class MaqeRobot extends Robot
{
    private $arrayWalkingOrders;
    private $direction;
    private $arrayDirection;
    private $positionX;
    private $positionY;

    public function __construct($walkingOrders)
    {
        preg_match_all("/[RLW][0-9]*/", $walkingOrders, $arrayWalkingOrders, PREG_PATTERN_ORDER);
        $this->arrayWalkingOrders = $arrayWalkingOrders[0];
        $this->direction = self::DIRECTION;
        $this->arrayDirection = self::ARRAY_DIRECTION;
        $this->positionX = self::POSITION_X;
        $this->positionY = self::POSITION_Y;
    }

    public function walk()
    {
        foreach ($this->arrayWalkingOrders as $arrayWalkingOrder) {
            $keyDirection = array_search($this->direction,$this->arrayDirection);
            switch($arrayWalkingOrder){
                case 'R':
                    $keyDirection++;
                    $this->direction = $this->findDirection($keyDirection, 4, self::NORTH, $this->arrayDirection);
                    break;
                case 'L':
                    $keyDirection--;
                    $this->direction = $this->findDirection($keyDirection, -1, self::WEST, $this->arrayDirection);
                    break;
                default:
                    $distance = str_replace("W","",$arrayWalkingOrder);
                    $position = $this->findDistance($this->direction, $distance, $this->positionX, $this->positionY);
                    $this->positionX = $position['x'];
                    $this->positionY = $position['y'];
                    break;
            }
        }
        
        return "X: $this->positionX Y: $this->positionY Direction: $this->direction";
    }

}