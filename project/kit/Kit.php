<?php

abstract class Kit
{
    public static $nbKits = 0;

    protected $ID;
    protected $label;
    protected $cost;
    protected $attack = 0;
    protected $defense = 0;
    protected $state = 1;

    public function __construct() {
        $this->ID = Kit::$nbKits;
        Kit::$nbKits++;
    }
    public function askChance($force) {
        $chance = mt_rand(0, 100);
        if ($force <= $chance) return true;
        else return false;
    }
    public function hurt($GladiatorHurted) {
        if ($GladiatorHurted) $attack = $this->attack / 2;
        else $attack = $this->attack;
        return $this->askChance($attack);
    }
    public function block() {
        return $this->askChance($this->defense);
    }
    public function getState() {
        return $this->state;
    }
    public function getCost() {
        return $this->cost;
    }
    public function getLabel() {
        return $this->label;
    }
    public function __tostring() {
        return sprintf($this->label);
    }
}
?>
