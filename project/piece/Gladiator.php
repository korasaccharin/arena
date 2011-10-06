<?php

/*
 * class Gladiator
 *
 */
class Gladiator extends Piece
{

  /** Aggregations: */

  var $m_;

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * Money se décrémente en fonction des équipements choisis
   * @access private
   */
  private $money = 10;

  /**
   * Tableau d'objet Kit
   * @access private
   */
  private $kits;

  /**
   * 
   * @access private
   */
  private $team;

  /**
   * Compris entre 1 et 3
   * 
   * @access private
   */
  private $rank;


  /**
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
  } // end of member function kitOut

  /**
   * est-ce que le coup porte ?
   *
   * @return bool
   * @access public
   */
  public function attack( ) {
  } // end of member function attack

  /**
   * 
   *
   * @return bool
   * @access public
   */
  public function defense( ) {
  } // end of member function defense





} // end of Gladiator
?>
