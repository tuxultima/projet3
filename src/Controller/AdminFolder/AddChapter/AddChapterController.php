<?php

namespace App\Controller\AdminFolder\AddChapter;

use App\Model\UserManager;
use App\Model\User;
use App\Model\Chapter;
use App\Model\ChapterManager;
use App\Model\NewsletterManager;
use App\Service\NewsletterMail;


class AddChapterController
{
	/**
	* add new chapter in database
	*/
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

		$nManager = new NewsletterManager();
		$email = $nManager->getOtherEmail();
		
		if ($email != false) {
			$objMail = new NewsletterMail();
			$objMail->sendMail($email, $title, $content);
			
		}

		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		header('Location: chapitresadmin');
		}
		else{
			header('Location:connexion');
		}
	}
}