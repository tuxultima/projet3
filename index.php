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
use App\Controller\AdminFolder\Admin\AdminController;
use App\Controller\AdminFolder\NewChapter\NewChapterController;
use App\Controller\AdminFolder\ChaptersAdmin\ChaptersAdminController;
use App\Controller\AdminFolder\CommentsAdmin\CommentsAdminController;
use App\Controller\AdminFolder\Moderate\ModerateController;
use App\Controller\Notice\NoticeController;
use App\Controller\AdminFolder\Censor\CensorController;
use App\Controller\AdminFolder\Agree\AgreeController;
use App\Controller\AdminFolder\AddChapter\AddChapterController;
use App\Controller\AdminFolder\CommentModerate\CommentModerateController;
use App\Controller\AdminFolder\UpdateChapter\UpdateChapterController;
use App\Controller\AdminFolder\UpdateTheChapter\UpdateTheChapterController;
use App\Controller\AddComment\AddCommentController;
use App\Controller\AdminFolder\DeleteChapter\DeleteChapterController;
use App\Controller\AdminFolder\NewsletterAdmin\NewsletterAdminController;
use App\Controller\AdminFolder\DeleteNewsletter\DeleteNewsletterController;
use App\Controller\AddNewsletter\AddNewsletterController;
use App\Model\User;
use App\Model\Chapter;
use App\Model\Comment;
use App\Model\Newsletter;

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

elseif ($url === 'report') {
	if (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['chapter-id']) {
	$reported = new Comment(['id'=>$_GET['id']]);
	$report = new ReportController();
	$report->report($reported, $_GET['chapter-id']);
	}
}

elseif ($url === 'connexion') {
	$connection = new ConnectionController();
	$connection->connection();
}

elseif ($url === 'tryconnection') {
	#$tryconnection = new TryConnectionController(); 
	#$tryconnection->tryconnection($_POST['nickname']);
	if (isset($_POST['nickname']) && isset($_POST['password'])) {
		$user = new User(['nickname' => $_POST['nickname'], 'password'=> $_POST['password'] ]);
		$tryconnection = new TryConnectionController();
		$tryconnection->tryconnection($user);
	}
}

elseif ($url === 'administration') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
	$admin = new AdminController();
	$admin->admin();	
	}
	else {
		header('Location: connexion');
	}
	
}

elseif ($url === 'nouveauchapitre') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		$newchapter = new NewChapterController();
		$newchapter->newchapter();
	}
	else {
		header('Location: connexion');
	}
	
	
}

elseif ($url === 'chapitresadmin') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		$chaptersadmin = new ChaptersAdminController();
		$chaptersadmin->chaptersadmin();	
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'commentairesadmin') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		$commentsadmin = new CommentsAdminController();
		$commentsadmin->commentsadmin();	
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'moderation') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		$moderate = new ModerateController();
		$moderate->moderate();
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'mentions') {
	$notice = new NoticeController();
	$notice->notice();	
}

elseif ($url === 'censor') {

	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$censored = new Comment(['id'=>$_GET['id']]);
			$censor = new CensorController();
			$censor->censor($censored);
		}
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'agree') {

	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$agreed = new Comment(['id'=>$_GET['id']]);
			$agree = new AgreeController();
			$agree->agree($agreed);
		}
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'addchapter') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		if (isset($_POST['title']) && isset($_POST['content'])) {
			if (!empty($_POST['title']) && !empty($_POST['content'])) {
				$addchapter = new AddChapterController();
				$addchapter->addchapter($_POST['title'], $_POST['content']);
			}
		}
			
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'commentairemoderer') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		$commentmoderate = new CommentModerateController();
		$commentmoderate->commentmoderate();
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'updatechapitre') {

	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$updatechaptersure = new Chapter(['id'=>$_GET['id']]);
			$updatechapter = new UpdateChapterController();
			$updatechapter->updatechapter($updatechaptersure);
		}
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'deletechapitre') {

	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$deletechaptersure = new Chapter(['id'=>$_GET['id']]);
			$deletechapter = new DeleteChapterController();
			$deletechapter->deleteChapter($deletechaptersure);
		}
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'updatethechapter') {

	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		
			if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content'])) {
			$update = new UpdateTheChapterController();
			$update->updatethechapter($_POST['id'], $_POST['title'], $_POST['content']);
			}
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'addcomment') {
		if (isset($_POST['nickname']) && isset($_POST['comment']) && isset($_POST['chapter_id'])) {
			if (!empty($_POST['nickname']) && !empty($_POST['comment']) && !empty($_POST['chapter_id'])) {
				$addcomment = new AddCommentController();
				$addcomment->addcomment($_POST['nickname'], $_POST['comment'], $_POST['chapter_id']);
			}
		}
}

elseif ($url === 'newsletteradmin') {
	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		$newsletteradmin = new NewsletterAdminController();
		$newsletteradmin->newsletteradmin();
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'deletenewsletter') {

	if (isset($_SESSION['id']) && isset($_SESSION['nickname'])) {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$deletenewslettersure = new Newsletter(['id'=>$_GET['id']]);
			$deletenewsletter = new DeleteNewsletterController();
			$deletenewsletter->deleteNewsletter($deletenewslettersure);
		}
	}
	else {
		header('Location: connexion');
	}
}

elseif ($url === 'addnewsletter') {
		if (isset($_POST['email'])) {
			if (!empty($_POST['email'])) {
				$addnewsletter = new AddNewsletterController();
				$addnewsletter->addnewsletter($_POST['email']);
			}
			else {
				header('Location: newsletters');
			}
		}
		
}