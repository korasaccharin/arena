<?php

/*
 * Includes
 */

require_once 'DataManager.php';
require_once 'Player.php';

require_once 'piece/Piece.php';
require_once 'piece/Team.php';
require_once 'piece/Gladiator.php';

require_once 'kit/interface/IShield.php';
require_once 'kit/interface/IWeapon.php';

require_once 'kit/Kit.php';
require_once 'kit/Trident.php';
require_once 'kit/Sword.php';
require_once 'kit/Spear.php';
require_once 'kit/Helmet.php';
require_once 'kit/RectShield.php';
require_once 'kit/LittleShield.php';
require_once 'kit/Knife.php';
require_once 'kit/Net.php';

require_once 'competition/Competition.php';
require_once 'competition/Battle.php';
require_once 'competition/Round.php';

/*
 * Arena
 */

class Arena
{
  private $players;
  private $fighters;

  public function __construct() {
    $dataPlayers = $this->getData();

    $this->createPlayers($dataPlayers);

    // XXX les joueurs devraient s'engager seuls
    // cf design pattern observeur / observable
    $this->engagePlayers();
    $this->startCompetition();
  }

  public function __destruct() {
  }

  private function getData() {
    $data = DataManager::getData();
    return $data;
  }

  private function createPlayers($dataPlayers) {
    foreach ($dataPlayers as $dataPlayer) {
      $player = new Player(
        $dataPlayer['name'],
        $dataPlayer['first_name'],
        $dataPlayer['username'],
        $dataPlayer['teams']
      );
      $this->players[] = $player;
    }
  }

  private function engagePlayers() {
    foreach ($this->players as $player) {
      if ($player->isCombatant()) {
        $this->fighters[] = $player->getTeamFighter();
      }
    }
  }

  public function startCompetition() {
    $competition = new Competition($this->fighters);
  }

  public function addPlayer( ) {
  }
  public function giveMiracleDrug() {
    foreach ($this->fighters as $fighter) {
      $fighter->resuscitate();
    }
  }

  /**
   * addFighter() est un écouteur d'évènement Player.engage()
   *
   * @param Team team 

   * @return 
   * @access public
   */
  public function addFighter( $team ) {
  }

}
?>
