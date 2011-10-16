<?php

class Competition
{

  private $teams;
  private $places;

  public function __construct($teams) {
    $this->teams = $teams;
    $this->sort();
    $this->launchBattles();
  }

  private function sort() {
    //Trie les équipes par leur pourcentage
    $teams = $this->teams;

    for($i=0;$i<count($teams);$i++){
      for($u=0;$u<count($teams);$u++){

        $firstTeam = $teams[$i]->getPercent();
        $secondTeam = $teams[$u]->getPercent();

        if($firstTeam < $secondTeam){
          $temp=$teams[$i];
          $teams[$i]=$teams[$u];
          $teams[$u]=$temp;
        }
      }
    }
    //classe les équipes par paire
    for($i=0; $i<count($teams); $i++){
      if($i%2==0){
        $this->places[] = array(
          'team_1'=>$teams[$i],
          'team_2'=>$teams[$i+1]
        );
      }
    }
  }

  private function launchBattles() {
    foreach ($this->places as $pair){
      new Battle($pair['team_1'], $pair['team_2']);
      $this->updateTeams($pair);
    }
  }

  /**
   * Met à jour les compteurs des équipes
   * 
   *
   * @return 
   * @access private
   */
  private function updateTeams($pair) {
    foreach ($pair as $team){
      if ($team->isLiving()) $team->addVictory();
      else $team->addDefeat();
    }
  }
}
?>
