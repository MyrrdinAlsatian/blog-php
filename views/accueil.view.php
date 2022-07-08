<?php
require_once("components/hero.php");
require_once("components/grid.php");
require_once("components/jumbotron.php");
print_r($page_data);
$articles = $page_data;

require_once("components/articlesListe.php");
