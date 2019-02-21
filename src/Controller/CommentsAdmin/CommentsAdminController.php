<?php

namespace App\Controller\CommentsAdmin;

use App\Model\UserManager;
use App\Model\User;
use App\Model\CommentManager;
use App\Model\Comment;

class CommentsAdminController
{
	public function commentsadmin()
	{
		$comments = new CommentManager();
		$results = $comments->getcomment();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/commentsadmin/commentsadmin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}