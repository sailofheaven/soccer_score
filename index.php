<?php
require_once 'autoload.php';

use App\Utils\Math;
use App\Providers\TeamDataProvider;

function match($c1, $c2)
{
    require 'data.php';
    $teams = new TeamDataProvider($data);
    $team1 = $teams->findByIndex($c1);
    $team2 = $teams->findByIndex($c2);

    return [
        Math::getScore($team1, $team2, $teams->getTotalGoalsAvg()),
        Math::getScore($team2, $team1, $teams->getTotalGoalsAvg())
    ];

}