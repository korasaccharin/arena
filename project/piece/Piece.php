<?php

abstract class Piece
{
    protected $ID;
    protected $name;
    protected $living = true;
    protected $battles = 0;
    protected $victories = 0;
    protected $defeats = 0;
    protected $percentVictories = 0;

    public function __construct($ID, $name) {
        $this->ID = $ID;
        $this->name = $name;
    }
    public function isLiving() {
        return $this->living;
    }

    private function calculatePercentVictories( ) {
        if($this->battles > 0) $percent = $this->victories / $this->battles*100;
        else $percent = 0;
        $this->percentVictories = $percent;
    }

    public function getPercent( ) {
        $this->calculatePercentVictories();
        return $this->percentVictories;
    }

    public function getBattles() {
        return $this->battles;
    }

    public function getVictories( ) {
        return $this->victories;
    }

    public function getDefeats( ) {
        return $this->defeats;
    }

    public function getID() {
        return $this->ID;
    }
    public function getName()
    {
        return $this->name;
    }
    public function addVictory() {
        $this->victories++;
        $this->battles++;
    }

    public function addDefeat() {
        $this->defeats++;
        $this->battles++;
    }
    public function resuscitate() {
        $this->living = true;
    }
    public function succumb() {
        $this->living = false;
    }
}
?>
