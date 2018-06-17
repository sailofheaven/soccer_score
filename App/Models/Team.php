<?php

namespace App\Models;


class Team
{
    public $name;
    public $games;
    public $win;
    public $draw;
    public $defeat;
    public $goalsScored;
    public $goalsSkiped;

    public $attackAvg;
    public $defenceAvg;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->games = $data['games'];
        $this->win = $data['win'];
        $this->draw = $data['draw'];
        $this->defeat = $data['defeat'];
        $this->goalsScored = $data['goals']['scored'];
        $this->goalsSkiped = $data['goals']['skiped'];

        $this->attackAvg = $this->goalsScored / $this->games;
        $this->defenceAvg = $this->goalsSkiped / $this->games;

    }

    public function getAttack()
    {
        return $this->attackAvg;
    }

    public function getDefence()
    {
        return $this->defenceAvg;
    }

    public function getGoalsScored()
    {
        return $this->goalsScored;
    }

    public function getGames()
    {
        return $this->games;
    }

}