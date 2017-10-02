<?php

namespace model;


/**
 * Model observer
 */
interface StickGameObserver {
	public function playerWins();
	public function playerLoose();
	public function setAiDrawnSticks(StickSelection $selection);
}