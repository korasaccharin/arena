<?php

class Round
{
  private static $INITIATIVE = array(
    "net",
    "spear",
    "trident",
    "sword",
    "knife"
  );

  private $winner;
  private $assailant;
  private $defender;

  /*
   * Retourne le gladiateur vainqueur
   *
   * @return 
   * @access public
   */
  public function __construct($G1, $G2) {
    $this->determineInitiative($G1, $G2);
    $this->fight($this->assailant, $this->defender, 0);
  }

  public function getWinner()
  {
    return $this->winner;
  }

  private function fight($assailant, $defender, $loop) {
    // XXX vaut null si plus d'un tour. pk ?
    $loop += 1;
    //echo $loop;
    if($assailant->attack() and !$defender->defense()) {
      $defender->succumb();
      return true; //end of round
    }
    $this->fight($defender, $assailant, $loop);
  }
  private function determineInitiative($G1, $G2) {
    /*
    foreach ($G1->getWeapons() as $weapon) {
      $weaponInitialive = array_search($weapon->getLabel(), Round::$INITIATIVE);
      echo "<br />";
      echo "<br />";
      echo "<br />";
      echo $weaponInitialive;
      echo "<br />";
    }
    $G2->getWeapons();
     */
    $g1_weapon = $G1->getWeapons();
    $g2_weapon = $G2->getWeapons();
    $g1_initiative = array_search($g1_weapon[0]->getLabel(), Round::$INITIATIVE);
    $g2_initiative = array_search($g2_weapon[0]->getLabel(), Round::$INITIATIVE);

    if($g1_initiative<$g2_initiative) {
      $this->assailant = $G1;
      $this->defender = $G2;
    } else {
      $this->assailant = $G2;
      $this->defender = $G1;
    }
  }
}
?>
