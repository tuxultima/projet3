<?php

namespace App\Controller\AdminFolder\NewsletterAdmin;

use App\Model\UserManager;
use App\Model\User;
use App\Model\NewsletterManager;
use App\Model\Newsletter;


class NewsletterAdminController
{
	public function newsletteradmin()
	{
		$newsletters = new NewsletterManager();
		$results = $newsletters->getNewsletter();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/newsletteradmin/newsletteradmin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}