<?php

/*
 * class Team
 * 
 */
class Team extends Piece
{

  /*
   * @access public
   *
   */
  public static $nbTeams = 0;


  /*
   * @access public
   *
   */
  public $ID;

  /*
   * @access public
   *
   */
  public $name;

  /*
   * @access private
   *
   */
  private $description;

  /**
   * 
   * @access private
   */
  private $player;

  /**
   * Tableau de type Gladiator
   * 
   * @access private
   */
  private $gladiators;


  /**
   * Renvoie gladiators
   *
   * @return array
   * @access public
   */
  public function getGladiators( ) {
  } // end of member function getGladiators

  /**
   * 
   *
   * @param array ranks [ID Gladiator] => rank

   * @return 
   * @access public
   */
  public function orderGladiators( $ranks ) {
  } // end of member function orderGladiators

  /**
   * 
   *
   * @param string name 

   * @return Gladiator
   * @access public
   */
  public function addGladiator( $name ) {
  } // end of member function addGladiator

  /**
   * 
   *
   * @return 
   * @access public
   */
  public function engage( ) {
  } // end of member function engage





} // end of Team
?>
