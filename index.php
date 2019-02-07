<?php 

session_start();

require('vendor/autoload.php');

use App\Controller\Home\HomeController;
use App\Controller\Newsletters\NewslettersController;
use App\Controller\AllChapters\AllChaptersController;
use App\Controller\About\AboutController;
use App\Controller\Contact\ContactController;
use App\Controller\Chapter\ChapterController;

$url = "";

if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

if ($url === 'accueil') {
	$home = new HomeController();
	$home->home();
}

elseif ($url === 'roman') {
	$allchapters = new AllChaptersController();
	$allchapters->allchapters();
}

elseif ($url === 'quisuisje') {
	$about = new AboutController();
	$about->about();
}

elseif ($url === 'newsletters') {
	$newsletters = new NewslettersController();
	$newsletters->newsletters();
}

elseif ($url === 'contact') {
	$contact = new ContactController();
	$contact->contact();
}

elseif ($url === 'chapitre') {
	$thechapter = new ChapterController();
	$thechapter->thechapter();
}

