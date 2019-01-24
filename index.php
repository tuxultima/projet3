<?php 

session_start();

require('vendor/autoload.php');

use App\Controller\Home\HomeController;

$url = "";

if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

if ($url === 'accueil') {
	$home = new HomeController();
	$home->home();
}

elseif ($url === 'roman') {
	$novel = new HomeController();
	$novel->novel();
}

elseif ($url === 'quisuisje') {
	$whoami = new HomeController();
	$whoami->whoami();
}

elseif ($url === 'newsletters') {
	$newsletters = new HomeController();
	$newsletters->newsletters();
}

elseif ($url === 'contact') {
	$contact = new HomeController();
	$contact->contact();
}