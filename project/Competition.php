require_once 'Battle.php';
require_once 'Team.php';


/**
 * class Competition
 * 
 */
class Competition
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * teams
   * 	[team_1]
   * 	[team_2]
   * 	[team_3]
   * 	[team_4]
   * @access private
   */
  private $teams;

  /**
   * Ce tableau n'existe pas. Il est créé par sort()
   * 
   * places
   * 	[battle_1] =>
   * 		[team_1]
   * 		[team_2]
   * 	[battle_2] =>
   * 		[team_1]
   * 		[team_2]
   * @access private
   */
  private $places;




  /**
   * Reçoit les équipes dans un tableau (teams)
   * 
   * places = sort(teams)
   * 
   * foreach battle in places
   * 	winner_team = launchBattle(team_1, team_2)
   * 	updateTeams()
   *
   * @return 
   * @access private
   */
  private function initialize( ) {
  } // end of member function initialize

  /**
   * Trie des équipes par rapport à leur pourcentage de victoire
   * Crée nos positionnements
   * Renvoie les positionnements
   *
   * @return 
   * @access private
   */
  private function sort( ) {
  } // end of member function sort

  /**
   * battle = new Battle(team_1, team_2)
   *
   * @param Team first_team 

   * @param Team second_team 

   * @return 
   * @access private
   */
  private function launchBattle( $first_team,  $second_team ) {
  } // end of member function launchBattle

  /**
   * Met à jour les compteurs des équipes
   * 
   *
   * @return 
   * @access private
   */
  private function updateTeams( ) {
  } // end of member function updateTeams



} // end of Competition
?>
