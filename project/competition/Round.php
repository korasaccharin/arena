<?php

class Round extends Duel
{
    public static $nbRounds = 0;

    private static $INITIATIVE = array(
        "net",
        "spear",
        "trident",
        "sword",
        "knife"
    );

    private $G1;
    private $G2;
    private $winner;
    private $assailant;
    private $defender;

    public function __construct($G1, $G2) {
        $this->G1 = $G1;
        $this->G2 = $G2;
        $this->ID = Round::$nbRounds;
        Round::$nbRounds++;
    }
    public function start() {
        $this->determineInitiative($this->G1, $this->G2);
        $this->fight($this->assailant, $this->defender, 0);
    }
    private function fight($assailant, $defender) {
        foreach ($assailant->getWeapons() as $weapon) {
            if($assailant->attack($weapon) and $weapon instanceof Net) {

                echo $assailant->getName() . " porte un coup de filet a " . $defender->getName() . "<br />";

                $defender->hurt();
            } elseif ($assailant->attack($weapon) and !$defender->defense()) {
                echo $assailant->getName() . " met " . $defender->getName() . " hors de combat.<br />";

                $defender->succumb();
                $this->stop();
                return null;
            } else {
                echo $assailant->getName() . " porte un coup avec " . $weapon . ", mais " . $defender->getName() . " resiste.<br />";
            }
        }
        $this->fight($defender, $assailant);
    }
    private function determineInitiative($G1, $G2) {
        $initiative = 0;
        $this->assailant = $G1;
        $this->defender = $G2;

        foreach ($G1->getWeapons() as $weapon) {
            $currentInitialive = array_search($weapon->getLabel(), Round::$INITIATIVE);
            if ($currentInitialive > $initiative) $initiative = $currentInitialive;
        }
        foreach ($G2->getWeapons() as $weapon) {
            $currentInitialive = array_search($weapon->getLabel(), Round::$INITIATIVE);
            if ($currentInitialive > $initiative) {
                $this->assailant = $G2;
                $this->defender = $G1;
                break;
            }
        }
    }
    private function stop() {
        $this->setStatus('END ROUND');
        $this->notify();
    }
    public function __tostring() {
        return sprintf("%s contre %s", $this->G1->getName(), $this->G2->getName());
    }
}
?>
