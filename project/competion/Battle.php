require_once 'Round.php';


/**
 * class Battle
 * 
 */
class Battle
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $ID;

  /**
   * Initializé lors de la construction de la bataille
   * @access private
   */
  private $living;


  /**
   * Reçoit team_1, team_2
   * 
   * initLiving()
   * winner_team = fight()
   * 
   * 
   *
   * @return 
   * @access public
   */
  public function initialize( ) {
  } // end of member function initialize



  /**
   * Par rapport au rang
   * 
   * Retourne les premiers gladiateurs vivants de chaque équipe
   *
   * @return 
   * @access private
   */
  private function select( ) {
  } // end of member function select

  /**
   * Fonction récursive tant que les deux équipes ont au moins un gladiateur vivant
   * 
   * G1, G2 = select()
   * winner = launchRound(G1, G2)
   * updateLiving()
   *
   * @return 
   * @access private
   */
  private function fight( ) {
  } // end of member function fight

  /**
   * 
   *
   * @return array
   * @access private
   */
  private function launchRound( ) {
  } // end of member function launchRound

  /**
   * Crée le tableau des vivants
   * 
   * [team_1]
   * 	[G1 (selon rang)] : 1
   * 	[G2 (selon rang)] : 1
   * [team_2]
   * 	[G1 (selon rang)] : 1
   * 	[G2 (selon rang)] : 1
   *
   * @return 
   * @access private
   */
  private function initLiving( ) {
  } // end of member function initLiving

  /**
   * 
   *
   * @return 
   * @access private
   */
  private function updateLiving( ) {
  } // end of member function updateLiving



} // end of Battle
?>
