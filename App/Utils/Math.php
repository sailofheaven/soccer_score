<?php

namespace App\Utils;


use App\Models\Team;

class Math
{
    public static function factorial($n)
    {
        if ($n < 2) {
            return 1;
        } else {
            return ($n * self::factorial($n - 1));
        }
    }

    public static function poisson($l, $h)
    {
        return round((exp(-$l) * pow($l, $h) / self::factorial($h)) * 100, 2);
    }

    public static function getGoals($prob)
    {
        $goals = 0;
        $currentChance = 0;
        $i = 0;

        while (($chance = self::poisson($prob, $i)) > 0) {
            $i++;
            if ($chance > $currentChance) {
                $goals = $i;
                $currentChance = $chance;
            }
        }

        return $goals;
    }


    public static function getScore(Team $team1, Team $team2, $totalScore)
    {
        $probablyTeam1 = $team1->getAttack() / $team2->getDefence() * $totalScore;

        return self::getGoals($probablyTeam1);
    }

}