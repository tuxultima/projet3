<?php

namespace App\Controller\AdminFolder\CommentModerate;

use App\Model\UserManager;
use App\Model\User;
use App\Model\CommentManager;
use App\Model\Comment;


class CommentModerateController
{
	/**
  	* get comments moderate
  	*/
	public function commentmoderate()
	{
		$comments = new CommentManager();
		$results = $comments->getblacklist();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/commentmoderate/commentmoderate.php');
		}
		else{
			header('Location:connexion');
		}
	}
}