<?php

namespace App\Controller\AdminFolder\UpdateTheChapter;

use App\Model\ChapterManager;
use App\Model\Chapter;
use App\Model\User;
use App\Model\UserManager;

class UpdateTheChapterController
{
	/**
	* update chapter in database
	*/
	public function updatethechapter($id, $title, $content)
	{
		$chap = new Chapter();
		$chap->setId($id);
		$chap->setTitle($title);
		$chap->setContent($content);
		$chapterManager = new ChapterManager();
		$chapterManager->updatingchapter($chap);
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