<?php

namespace App\Providers;


use App\Exceptions\TeamException;
use App\Models\Team;

class TeamDataProvider implements DataProviderInerface
{
    public static $data;
    public $totalGoalsAvg;
    public static $teamsList;

    public function __construct($data = [])
    {
        if (!isset(self::$teamsList)) {
            $this->setTeamList($data);
        }
        $this->setTotalAvg();

    }

    private function setTotalAvg()
    {
        $totalGoals = 0;
        foreach (self::$teamsList as $item) {
            $totalGoals += $item->getGoalsScored() / $item->getGames();
        }

        $this->totalGoalsAvg = $totalGoals / count(self::$teamsList);
    }

    public function getTotalGoalsAvg()
    {
        return $this->totalGoalsAvg;
    }

    private function setTeamList($data)
    {
        foreach ($data as $index => $item) {
            self::$teamsList[$index] = new Team($item);
        }
    }

    public function findByIndex($i)
    {
        if (!isset(self::$teamsList[$i])) {
            throw new TeamException(sprintf('Team not found by index - "%s".', $i));
        }

        return self::$teamsList[$i];
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}