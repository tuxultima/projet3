<?php

namespace App\Controller\AdminFolder\ChaptersAdmin;

use App\Model\UserManager;
use App\Model\User;
use App\Model\ChapterManager;

class ChaptersAdminController
{
	public function chaptersadmin()
	{
		$chapter = new ChapterManager();
		$results = $chapter->getChapters();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/chaptersadmin/chaptersadmin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}