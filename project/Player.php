<?php

class Player
{
    public static $nbPlayers = 0;

    public $ID;
    public $name;
    public $first_name;
    public $username;

    private $combatant = false;
    private $teams;

    public function __construct($name, $first_name, $username, $teams) {
        $this->name = $name;
        $this->first_name = $first_name;
        $this->username = $username;
        $ID = Player::$nbPlayers;

        Player::$nbPlayers++;

        foreach ($teams as $team) {
            $this->createTeam($team);
        }
    }

    public function createTeam($team) {
        $team = new Team(
            $team['name'],
            $team['description'],
            $team['gladiators']['gladiator']
        );
        $this->teams[] = $team;
    }
    public function isCombatant() {
        return $this->combatant;
    }
    public function getTeamFighter() {
        // $this->teams[mt_rand(0,3)];
        return $this->teams[0];
    }
    public function register(IObserver $observer) {
        $this->observers[] = $observer;
    }
    public function engage() {
        $this->combatant = true;
        $this->notify();
    }
    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->addFighter($this);
        }
    }
}
?>
