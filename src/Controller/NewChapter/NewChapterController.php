<?php

namespace App\Controller\NewChapter;

use App\Model\UserManager;
use App\Model\User;

class NewChapterController
{
	public function newchapter()
	{
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/newchapter/newchapter.php');
		}
		else{
			header('Location:connexion');
		}
	}
}