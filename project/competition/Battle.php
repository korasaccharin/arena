<?php

class Battle
{
  private $ID;
  private $living = true;
  private $firstTeam;
  private $secondTeam;

  /*
   * Reçoit team_1, team_2
   *
   * initLiving()
   * winner_team = fight()
   *
   * @return 
   * @access public
   */
  public function __construct($firstTeam, $secondTeam) {
    $this->firstTeam = $firstTeam;
    $this->secondTeam = $secondTeam;

    //équipe 1
    /*
    echo "<br /> EQUIPE 1 : ".$team_1->getName().'<br /><br /> ';
    for($i=0; $i<count($this->gladiatorsTeam1);$i++)
    {
      echo $this->gladiatorsTeam1[$i]->getName().'<br />';
    }
    echo "<br />Affronte : <br /><br />";
    echo " EQUIPE 2 : ".$team_2->getName().'<br /><br />';
    //équipe 2
    for($i=0; $i<count($this->gladiatorsTeam2);$i++)
    {
      echo $this->gladiatorsTeam2[$i]->getName().'<br />';
    }
     */

    //Lancement de la battle
    /*
    while($this->alive($this->gladiatorsTeam1) > 0 and $this->alive($this->gladiatorsTeam2) > 0){
      $this->fight();
    }
     */
    $this->fight();

    /*
    //Affiche le gagnant
    if($this->alive($this->gladiatorsTeam1) > 0){
      echo "L'equipe gagnante est : ".$team_1->getName().'<br /><br />';
      $team_1->addVictory();
      $team_2->addDefeat();
    }
    else
    {
      echo "L'equipe gagnante est : ".$team_2->getName().'<br /><br />';
      $team_2->addVictory();
      $team_1->addDefeat();
    }
     */
  }

  //revoit le premier gladiator en vie et renvoi false si tout les gladiateurs sont morts
  private function select($gladiators) {
    for($i=0;$i<count($gladiators);$i++)
    {
      if($gladiators[$i]->getLiving() == true)
      {
        return $gladiators[$i];
      }
    }
  }

  private function alive($gladiators){
    $cpt=0;
    for($i=0; $i<count($gladiators);$i++)
    {
      if($gladiators[$i]->getLiving() == true)
      {
        $cpt++;
      }
    }
    return $cpt;
  }

  private function fight() {
    $G1 = $this->firstTeam->getFirstLivingGladiator();
    $G2 = $this->secondTeam->getFirstLivingGladiator();

    if (!$G1) {
      $this->firstTeam->succumb();
      return null;
    } elseif(!G2) {
      $this->secondTeam->succumb();
      return null;
    }

    new Round($G1, $G2);
    $this->fight();
  }
}
?>
