<?php

namespace App\Controller\Admin;

use App\Model\UserManager;
use App\Model\User;

class AdminController
{
	public function admin()
	{
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/admin/admin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}