<?php
require_once("components/hero.php");
require_once("components/grid.php");
require_once("components/jumbotron.php");
print_r($page_data);
$articles = $page_data;
$headers = "From: seror67@gmail.com";
$sendTo = "stephan.jeanba@gmail.com";
$subject = "test subject";
$content = "test content";

mail($sendTo, $subject, $content, $headers);
require_once("components/articlesListe.php");
