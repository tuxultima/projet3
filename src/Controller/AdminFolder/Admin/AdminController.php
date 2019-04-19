<?php

namespace App\Controller\AdminFolder\Admin;

use App\Model\UserManager;
use App\Model\User;
use App\Model\CommentManager;
use App\Model\Comment;
use App\Model\ContactManager;
use App\Model\Contact;


class AdminController
{
	/**
  	* render the admin page
  	*/
	public function admin()
	{
		$comments = new CommentManager();
		$resultsCom = $comments->getCommentLimit();
		$contacts = new ContactManager();
		$resultsContact = $contacts->getContactsLimit();
		$contactNumber = new ContactManager();
		$resultsContactNumber = $contactNumber->getContactNumber();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/admin/admin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}