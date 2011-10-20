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

require_once 'interface/IObservable.php';
require_once 'interface/IObserver.php';

require_once 'competition/Duel.php';
require_once 'competition/Competition.php';
require_once 'competition/Battle.php';
require_once 'competition/Round.php';

/*
 * Arena
 */

class Arena implements IObserver
{
    private $players;
    private $fighters;

    public function __construct() {
        $dataPlayers = $this->getData();

        $this->createPlayers($dataPlayers);
    }

    public function __destruct() {}

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
            $player->register($this);
            $player->engage();
            $this->players[] = $player;
        }
    }

    public function startCompetition() {
        $competition = new Competition($this->fighters);
        $competition->register($this);

        echo "<p>Le tournoi commence </p>";
        $competition->start();
    }

    public function addPlayer( ) {}

        public function giveMiracleDrug() {
            foreach ($this->fighters as $fighter) {
                $fighter->resuscitate();
            }
        }

    public function addFighter($player) {
        $this->fighters[] = $player->getTeamFighter();
        $this->frameHandler();
    }
    public function update($IDCompetition) {
        echo "Fin de la competition";
    }

    private function frameHandler() {
        if (count($this->fighters) == 4) {
            $this->startCompetition();
        }
    }
}
?>
