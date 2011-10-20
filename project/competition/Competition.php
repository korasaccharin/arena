<?php

class Competition extends Duel
{
    public static $nbCompetitions = 0;

    private $teams;
    private $places;

    public function __construct($teams) {
        $this->ID = Competition::$nbCompetitions;
        Competition::$nbCompetitions++;

        $this->teams = $teams;
    }
    public function start() {
        $this->sort();
        $this->match();
        $this->fight();
    }

    private function sort() {
        $modification = false;

        foreach ($this->teams as $key => $team) {
            if ($key != 0) {
                if ($previous->getPercent() < $team->getPercent()) {
                    $this->team[$key - 1] = $team;
                    $this->team[$key] = $previous;
                    $modification = true;
                }
            }
            $previous = $team;
        }
        if ($modification) $this->sort();
        else return true;
    }
    private function match() {
        foreach ($this->teams as $key => $team) {
            if ($key % 2) {
                $this->places[] = array(
                    'team_1' => $previous,
                    'team_2' => $team
                );
            }
            $previous = $team;
        }
    }

    private function fight() {
        echo "Les combats suivant vont avoir lieu : <br />";

        foreach ($this->places as $pair){
            $battle = new Battle($pair['team_1'], $pair['team_2']);

            $battle->register($this);
            echo "$battle <br />";

            $this->battles[] = $battle;
        }

        echo "<p>Commencons les combats</p>";

        foreach ($this->battles as $battle) $battle->start();
    }

    private function updateTeams($firstTeam, $secondTeam) {
        if ($firstTeam->isLiving()) {
            $firstTeam->addVictory();
            echo "<p>" . $firstTeam->getName() . " gagne le combat.</p>";
        } else $firstTeam->addDefeat();

        if ($secondTeam->isLiving()) {
            $secondTeam->addVictory();
            echo "<p>" . $firstTeam->getName() . " gagne le combat.</p>";
        } else $secondTeam->addDefeat();
    }
    public function stop() {
        $this->getStatus('END COMPETITION');
        $this->notify();
    }

    public function update($IDBattle) {
        $battle = $this->battles[$IDBattle];
        if ($battle->getStatus() == 'END BATTLE') {
            $this->updateTeams(
                $battle->getFirstTeam(),
                $battle->getSecondTeam()
            );
            unset($this->battles[$IDBattle]);
        }
        if (count($this->battles) == 0) {
            $this->stop();
        }
    }
}
?>
