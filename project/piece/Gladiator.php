<?php

class Gladiator extends Piece
{
    public static $nbGladiators = 0;
    private $isHurted = 0;
    private $weapons = array();
    private $shields = array();

    private $money = 10;
    private $kits;
    private $rank;

    public function __construct($name, $kits, $rank) {
        parent::__construct(Gladiator::$nbGladiators, $name);
        $this->rank = $rank;
        Gladiator::$nbGladiators++;

        foreach ($kits as $kit) {
            $this->kitOut($kit);
        }
    }

    public function kitOut($label) {
        switch ($label) {
        case "LittleShield":
            $kit = new LittleShield();
        case "Helmet":
            $kit = new Helmet();
            break;
        case "Spear":
            $kit = new Spear();
            break;
        case "Trident":
            $kit = new Trident();
            break;
        case "Knife":
            $kit = new Knife();
            break;
        case "Net":
            $kit = new Net();
            break;
        case "RectShield":
            $kit = new RectShield();
            break;
        case "Sword":
            $kit = new Sword();
            break;
        }
        if ($this->setMoney($kit->getCost())) {
            $this->kits[] = $kit;

            if ($kit instanceof IShield) $this->shields[] = $kit;
            if ($kit instanceof IWeapon) $this->weapons[] = $kit;
        }
    }

    private function setMoney($cost)
    {
        if ($this->money -= $cost > 0) {
            $this->money -= $cost;
            return true;
        } else {
            return false;
        }
    }

    public function attack($weapon) {
        if ($weapon->hurt($this->isHurted)) return true;
        else return false;
    }

    public function defense() {
        foreach ($this->shields as $shield) {
            if ($shield->block()) return true;
        }
        return false;
    }
    public function hurt() {
        $this->isHurted = 1;
    }
    public function isHurted() {
        return $this->isHurted;
    }

    public function resuscitate() {
        parent::resuscitate();

        foreach ($this->weapons as $weapon) {
            if ($weapon instanceof Net) $weapon->repair();
        }
    }

    public function getWeapons() {
        $validWeapons = array ();
        foreach ($this->weapons as $weapon) {
            if ($weapon->getState()) $validWeapons[] = $weapon;
        }
        return $validWeapons;
    }
    public function getShields() {
        return $this->shields;
    }
    public function __toString() {
        return sprintf("%s for team %s", $this->name, __CLASS__);
    }
    public function getLiving() {
        return $this->living;
    }
    public function isLiving() {
        return $this->living;
    }

    public function setRank($rank) {
        $this->rank=$rank;
    }

    public function getRank() {
        return $this->rank;
    }
}
?>
