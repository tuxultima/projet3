<?php

namespace App\Controller\AddChapter;

use App\Model\UserManager;
use App\Model\User;
use App\Model\Chapter;
use App\Model\ChapterManager;


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
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		header('Location: chapitresadmin');
		}
		else{
			header('Location:connexion');
		}
	}
}