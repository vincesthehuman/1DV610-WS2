<?php

session_start();

require_once("controller/Game.php");
require_once("view/HTMLPage.php");

$controller = new controller\Game();


$body = $controller->runGame();


$page = new view\HTMLPage();

echo $page->render("Game of sticks", $body);
