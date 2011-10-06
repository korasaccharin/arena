<?php

/**
 * class Player
 * 
 */
class Player
{

  /**
   * 
   * @access public
   */
  public $ID;

  /*
   * @access public
   *
   */
  public $name;

  /*
   * @access public
   *
   */
  public $first_name;

  /*
   * @access public
   *
   */
  public $username;

  /*
   * @access public
   *
   */
  public static $nbPlayers = 0;

  public function __construct($name, $first_name, $username, $teams) {
    $this->name = $name;
    $this->first_name = $first_name;
    $this->username = $username;

    Player::$nbPlayers++;

    foreach ($teams as $team) {
      $this->createTeam($team);
    }
  }

  public function createTeam($team) {
    $team = new Team(
      $team['name'],
      $team['description']
    );
  }
}
?>
