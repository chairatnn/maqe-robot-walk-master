<?php

class RoBot
{
    const NORTH = 0;
    const EAST = 1;
    const SOUTH = 2;
    const WEST = 3;

    const POSITION_X = 0;
    const POSITION_Y = 0;
    const DIRECTION = 'North';
    const ARRAY_DIRECTION = array('North','East','South','West');

    protected function findDirection($keyDirection, $check_direction, $change_direction, $arrayDirection){
        if($keyDirection == $check_direction){
            $keyDirection = $change_direction;
        }
        return $arrayDirection[$keyDirection];
    }
    
    protected function findDistance($direction, $distance, $positionX, $positionY){
        switch($direction){
            case 'North':
                $positionY += $distance;
                break;
            case 'East':
                $positionX += $distance;
                break;
            case 'South':
                $positionY -= $distance;
                break;
            case 'West':
                $positionX -= $distance;
                break;
            default:
                break;
        }
        return [
            'x' => $positionX,
            'y' => $positionY
        ];
    
    }
}
