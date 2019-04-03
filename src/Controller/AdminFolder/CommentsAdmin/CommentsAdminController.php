<?php

namespace App\Controller\AdminFolder\CommentsAdmin;

use App\Model\UserManager;
use App\Model\User;
use App\Model\CommentManager;
use App\Model\Comment;

class CommentsAdminController
{
	/**
  	* get comments by id
  	*/
	public function commentsadmin()
	{
		$comments = new CommentManager();
		$results = $comments->getcomment();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/commentsadmin/commentsadmin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}