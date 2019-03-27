<?php

namespace App\Controller\AdminFolder\AddChapter;

use App\Model\UserManager;
use App\Model\User;
use App\Model\Chapter;
use App\Model\ChapterManager;
use App\Model\NewsletterManager;
use App\Service\Mail;


class AddChapterController
{
	public function addchapter($title, $content)
	{
		$ch = new Chapter();
		$ch->setTitle($title);
		$ch->setContent($content);
		$chapterManager = new ChapterManager();
		$chapterManager->addchapter($ch);
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();

		//$nManager = new NewsletterManager();
		//$email = $nManager->getEmail();
		//if ($email != false) {
		//	$objMail = new Mail();
		//	$objMail->sendMail($email, $ch);
		//}

		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		header('Location: chapitresadmin');
		}
		else{
			header('Location:connexion');
		}
	}
}