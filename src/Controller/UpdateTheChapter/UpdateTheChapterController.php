<?php

namespace App\Controller\UpdateTheChapter;

use App\Model\ChapterManager;
use App\Model\Chapter;
use App\Model\User;
use App\Model\UserManager;

class UpdateTheChapterController
{
	public function updatethechapter(Chapter $chapterId)
	{
		$chapterManager = new ChapterManager();
		$chapterManager->updatingchapter($chapterId);
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