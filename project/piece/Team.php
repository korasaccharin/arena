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
    //var_dump($this->gladiators);
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

  public function orderGladiators( $ranks ) {//$ranks = ID + Rank
    for($i=0; $i < count($ranks);$i++) {
      for($cpt=0;$cpt=count($this->gladiators);$cpt++) {
        if($ranks[$i] == $this->gladiators[$cpt]->getId()) {
          $this->setRank($ranks[$i]->rank);
        }
      }
    }
  }

  public function sortByRank()
  {
    for($i=0;$i<count($this->gladiators);$i++){
      for($u=0;$u<count($this->gladiators);$u++){
        $rank1 = $this->gladiators[$i]->getRank();
        $rank2 = $this->gladiators[$u]->getRank();
        if($rank1 < $rank2){
          $temp=$this->gladiators[$i];
          $this->gladiators[$i]=$this->gladiators[$u];
          $this->gladiators[$u]=$temp;
        }
      }
    }
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

  public function engage( ) {
  }
}
?>
