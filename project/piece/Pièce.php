

/**
 * class Pièce
 * 
 */
abstract class Pièce
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
   * 
   * @access private
   */
  private $name;

  /**
   * 
   * @access private
   */
  private $battles = 0;

  /**
   * 
   * @access private
   */
  private $victories = 0;

  /**
   * 
   * @access private
   */
  private $defeats = 0;

  /**
   * 
   * @access private
   */
  private $percentVictories;


  /**
   * nbMatchWon / nbMatch
   *
   * @return 
   * @access public
   */
  public function calculatePercentVictories( ) {
  } // end of member function calculatePercentVictories

  /**
   * 
   *
   * @return int
   * @access public
   */
  public function getPercent( ) {
  } // end of member function getPercent

  /**
   * 
   *
   * @return int
   * @access public
   */
  public function getNbMatch( ) {
  } // end of member function getNbMatch

  /**
   * 
   *
   * @return int
   * @access public
   */
  public function getVictories( ) {
  } // end of member function getVictories

  /**
   * 
   *
   * @return 
   * @access public
   */
  public function getNbMatchLosed( ) {
  } // end of member function getNbMatchLosed

  /**
   * 
   *
   * @param int match 

   * @return int
   * @access public
   */
  public function addVictory( $match = 1 ) {
  } // end of member function addVictory

  /**
   * 
   *
   * @param int match 

   * @return int
   * @access public
   */
  public function addDefeat( $match = 1 ) {
  } // end of member function addDefeat



  /**
   * addMatchWon() et addMatchLosed() lance updateNbMatch()
   *
   * @return 
   * @access private
   */
  private function updateNbMatch( ) {
  } // end of member function updateNbMatch



} // end of Pièce
?>
