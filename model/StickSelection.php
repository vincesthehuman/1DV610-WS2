<?php

namespace model;


/**
 * Encapsulate how many sticks a player draws
 * can be 1,2 or 3
 */
class StickSelection {

		/**
	 * @var int (1,2,3)
	 */
	 private $amount;

	/**
	 * Private constructor makes sure we cannot create outside of 1,2,3
	 * @param [type] $amount [description]
	 */
	 private function __construct($amount) {
		$this->amount = $amount;
	}

	public static function sticksToDraw($sticksDrawn) {
		return new StickSelection($sticksDrawn);
	}

	public function getAmount() {
		return $this->amount;
	}
}