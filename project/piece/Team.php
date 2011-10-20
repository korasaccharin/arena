<?php
class Team extends Piece
{
    public static $nbTeams = 0;

    private $description;
    private $gladiators;

    public function __construct($name, $description, $gladiators) {
        parent::__construct(Team::$nbTeams, $name);

        $this->description = $description;
        Team::$nbTeams++;

        foreach ($gladiators as $gladiator) {
            $this->createGladiator($gladiator);
        }
    }
    public function getGladiators( ) {
        $this->sortByRank();
        return $this->gladiators;
    }
    public function getFirstLivingGladiator() {
        foreach ($this->gladiators as $gladiator) {
            if ($gladiator->isLiving()) return $gladiator;
        }
        return null;
    }
    public function sortByRank() {
        $modification = false;

        foreach ($this->gladiators as $key => $gladiator) {
            if ($key != 0) {
                if ($previous->getRank() < $gladiator->getRank()) {
                    $this->gladiators[$key - 1] = $gladiator;
                    $this->gladiators[$key] = $previous;
                    $modification = true;
                }
            }
            $previous = $gladiator;
        }
        if ($modification) $this->sortByRank();
        else return true;
    }
    public function createGladiator($gladiator) {
        $gladiator = new Gladiator(
            $gladiator['name'],
            $gladiator['kit'],
            $gladiator['rank']
        );
        $this->gladiators[] = $gladiator;
    }
    public function resuscitate() {
        parent::resuscitate();

        foreach ($this->gladiators as $gladiator) {
            $gladiator->resuscitate();
        }
    }
    public function addGladiator($gladiator) {
        $this->gladiators[] = new Gladiator($gladiator['name']);
    }
    public function __tostring() {
        return sprintf("Team %s", $this->getName());
    }
}
?>
