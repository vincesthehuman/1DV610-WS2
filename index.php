<?php

session_start();

require_once("controller/PlayGame.php");
require_once("view/HTMLPage.php");

$controller = new controller\PlayGame();


$body = $controller->runGame();


$page = new view\HTMLPage();

echo $page->render("Game of sticks", $body);




