<?php

namespace controller;

require_once("model/LastStickGame.php");
require_once("view/GameView.php");

class Game {

	/**
	 * @var \model\LastStickGame
	 */
	private $game;

	/**
	 * @var \view\GameView
	 */
	private $view;

	/**
	 * @var string
	 */
	private $message = "";


	public function __construct() {
		$this->game = new \model\LastStickGame();
		$this->view = new \view\GameView($this->game);
	}

	/**
	* Starts the game
	* @return String HTML
	*/
	public function runGame() {
		if ($this->game->isGameOver()) {
			$this->game->newGame();
		} else {
			$this->playerDraw();
		}

		//Generate Output
		return $this->view->show($this->message);
	}

	/**
	* Checks how many sticks player selects, throws exception if not valid input
	*/
	private function playerDraw() {
		if (isset($_GET["draw"])) {
			try {
				$sticksDrawnByPlayer = $this->getNumberOfSticks();
				$this->game->playerSelectsSticks($sticksDrawnByPlayer, $this->view);
			} catch(\Exception $e) {
				$this->message = "Unauthorized input";
			}
		}
	}

	/** 
	* @return \model\StickSelection
	*/
	private function getNumberOfSticks() {

		switch ($_GET["draw"]) {
			case 1 :
			case 2 :
			case 3 : return \model\StickSelection::sticksToDraw($_GET["draw"]); break;
		}
		throw new \Exception("Invalid input");
	}
}