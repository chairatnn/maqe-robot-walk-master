#!/usr/bin/php
<?php

require_once('MaqeRobot.php');

$walkingOrders = $argv[1];

$maqeRobot = new MaqeRobot($walkingOrders);
$maqeRobotWalk = $maqeRobot->walk();
echo "$maqeRobotWalk\n";