<?php

namespace App\Controller\AdminFolder\Moderate;

use App\Model\UserManager;
use App\Model\User;
use App\Model\CommentManager;
use App\Model\Comment;


class ModerateController
{
	/**
  	* get comments reported
  	*/
	public function moderate()
	{
		$comments = new CommentManager();
		$results = $comments->getreported();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/moderate/moderate.php');
		}
		else{
			header('Location:connexion');
		}
	}
}