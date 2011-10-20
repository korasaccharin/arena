<?php

class Battle extends Duel
{
    public static $nbBattles = 0;

    private $living = true;
    private $firstTeam;
    private $secondTeam;

    private $G1;
    private $G2;
    private $currentRound;

    public function __construct(Team $firstTeam, Team $secondTeam) {
        $this->firstTeam = $firstTeam;
        $this->secondTeam = $secondTeam;
        $this->ID = Battle::$nbBattles;
        Battle::$nbBattles++;
    }
    public function start() {
        $this->G1 = $this->firstTeam->getFirstLivingGladiator();
        $this->G2 = $this->secondTeam->getFirstLivingGladiator();

        if (!$this->G1) {
            $this->stop($this->firstTeam);
        } elseif(!$this->G2) {
            $this->stop($this->secondTeam);
        } else {
            $this->fight();
        }
    }
    public function fight() {
        $this->currentRound = new Round($this->G1, $this->G2);

        echo "<p>$this->currentRound </p>";

        $this->currentRound->register($this);
        $this->currentRound->start();
    }
    public function stop(Team $team) {
        $team->succumb();
        $this->setStatus('END BATTLE');
        $this->notify();
    }
    public function update($IDRound) {
        if ($this->currentRound->getStatus() == 'END ROUND') {
            $this->start();
        }
    }
    public function __tostring() {
        return sprintf("%s VS %s", $this->firstTeam->getName(), $this->secondTeam->getName());
    }
    public function getFirstTeam() {
        return $this->firstTeam;
    }
    public function getSecondTeam() {
        return $this->secondTeam;
    }
}
?>
