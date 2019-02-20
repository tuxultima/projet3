<?php 

session_start();

require('vendor/autoload.php');

use App\Controller\Home\HomeController;
use App\Controller\Newsletters\NewslettersController;
use App\Controller\AllChapters\AllChaptersController;
use App\Controller\About\AboutController;
use App\Controller\Contact\ContactController;
use App\Controller\Chapter\ChapterController;
use App\Controller\Report\ReportController;
use App\Controller\Connection\ConnectionController;
use App\Controller\TryConnection\TryConnectionController;
use App\Controller\Admin\AdminController;
use App\Controller\NewChapter\NewChapterController;
use App\Controller\ChaptersAdmin\ChaptersAdminController;
use App\Controller\CommentsAdmin\CommentsAdminController;
use App\Controller\Moderate\ModerateController;
use App\Model\Chapter;
use App\Model\Comment;

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
	if (isset($_GET['id']) && $_GET['id'] > 0) {
	$chapter = new Chapter(['id'=>$_GET['id']]);
	$thechapter = new ChapterController();
	$thechapter->thechapter($chapter);
	}
}

elseif ($url == 'report') {
	if (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['chapter-id']) {
	$reported = new Comment(['id'=>$_GET['id']]);
	$report = new ReportController();
	$report->report($reported, $_GET['chapter-id']);
	}
}

elseif ($url == 'connexion') {
	$connection = new ConnectionController();
	$connection->connection();
}

elseif ($url == 'tryconnection') {
	$tryconnection = new TryConnectionController();
	$tryconnection->tryconnection($_POST['nickname']);
}

elseif ($url == 'administration') {
	$admin = new AdminController();
	$admin->admin();
}

elseif ($url == 'nouveauchapitre') {
	$newchapter = new NewChapterController();
	$newchapter->newchapter();
}

elseif ($url == 'chapitresadmin') {
	$chaptersadmin = new ChaptersAdminController();
	$chaptersadmin->chaptersadmin();
}

elseif ($url == 'commentairesadmin') {
	$commentsadmin = new CommentsAdminController();
	$commentsadmin->commentsadmin();
}

elseif ($url == 'modération') {
	$moderate = new ModerateController();
	$moderate->moderate();
}