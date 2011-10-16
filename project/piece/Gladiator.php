<?php

class Gladiator extends Piece
{

  public static $nbGladiators = 0;
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
      $this->createKit($kit);
    }
  }

  public function getLiving()
  {
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

  public function createKit($kit) {
    switch ($kit) {
      case "LittleShield":
        $LittleShield = new LittleShield();
        $this->kits[] = $LittleShield;

        if ($LittleShield instanceof IShield) $this->shields[] = $LittleShield;
        if ($LittleShield instanceof IWeapon) $this->weapons[] = $LittleShield;

        $this->setMoney($LittleShield->getCost());
        break;
      case "Helmet":
        $Helmet = new Helmet();

        if ($Helmet instanceof IShield) $this->shields[] = $Helmet;
        if ($Helmet instanceof IWeapon) $this->weapons[] = $Helmet;

        $this->kits[]  = $Helmet;
        $this->setMoney($Helmet->getCost());
        break;
      case "Spear":
        $Spear = new Spear();

        if ($Spear instanceof IShield) $this->shields[] = $Spear;
        if ($Spear instanceof IWeapon) $this->weapons[] = $Spear;

        $this->kits[]  = $Spear;
        $this->setMoney($Spear->getCost());
        break;
      case "Trident":
        $Trident = new Trident();

        if ($Trident instanceof IShield) $this->shields[] = $Trident;
        if ($Trident instanceof IWeapon) $this->weapons[] = $Trident;

        $this->kits[]  = $Trident;
        $this->setMoney($Trident->getCost());
        break;
      case "Knife":
        $Knife = new Knife();

        if ($Knife instanceof IShield) $this->shields[] = $Knife;
        if ($Knife instanceof IWeapon) $this->weapons[] = $Knife;

        $this->kits[]  = $Knife;
        $this->setMoney($Knife->getCost());
        break;
      case "Net":
        $Net = new Net();

        if ($Net instanceof IShield) $this->shields[] = $Net;
        if ($Net instanceof IWeapon) $this->weapons[] = $Net;

        $this->kits[]  = $Net;
        $this->setMoney($Net->getCost());
        break;
      case "RectShield":
        $RectShield = new RectShield();

        if ($RectShield instanceof IShield) $this->shields[] = $RectShield;
        if ($RectShield instanceof IWeapon) $this->weapons[] = $RectShield;

        $this->kits[]  = $RectShield;
        $this->setMoney($RectShield->getCost());
        break;
      case "Sword":
        $Sword = new Sword();

        if ($Sword instanceof IShield) $this->shields[] = $Sword;
        if ($Sword instanceof IWeapon) $this->weapons[] = $Sword;

        $this->kits[]  = $Sword;
        $this->setMoney($Sword->getCost());
        break;
    }
  }

  private function setMoney($cost)
  {
    // XXX WARNING : on paie et après on s'équipe.
    // Si pas assez d'argent : equipement refusé
    $this->money -= $cost;
  }
  /*
   * (Kit) var myKit;
   * 
   * myKit = SomeKit();
   * => SomeKit() peut valoir Trident(); Spear(); etc.
   * 
   * => décrémente “money“
   * => se répète tant que “money” ne vaut pas 0
   * => fonction récursive ?
   *
   * @param Kit kit 

   * @return 
   * @access public
   */
  public function kitOut( $kit ) {
  }

  /**
   * est-ce que le coup porte ?
   *
   * @return bool
   * @access public
   */

  public function attack() {
    foreach ($this->weapons as $weapon) {
      if ($weapon->wound()) return true;
    }
    return false;
  }

  /*
   * @return bool
   * @access public
   */
  public function defense() {
  }

  public function getID() {
    return $this->ID;
  }
  public function getWeapons() {
    return $this->weapons;
  }
  public function getShields() {
    return $this->shields;
  }
}
?>
