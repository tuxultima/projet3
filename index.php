<?php 

session_start();

require('vendor/autoload.php');

use App\Controller\Home\HomeController;

$url = "";

if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

if ($url === 'acceuil') {
	$home = new HomeController();
	$home->home();
}