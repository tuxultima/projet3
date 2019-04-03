<?php

namespace App\Controller\TryConnection;

use App\Model\UserManager;
use App\Model\User;

class TryConnectionController
{
	/**
  	* connection admin account
  	*/
	public function tryconnection(User $user)
	{
		

		$uManager = new UserManager();
		$check = $uManager->getConnection($user);
		if ($check['nickname'] != null && $user->getNickname() == $check['nickname']) {
			if (password_verify($user->getPassword(),$check['password'])) {
				$_SESSION['id'] = $check['id'];
				$_SESSION['nickname'] = $check['nickname'];
				require ('src/View/adminfolder/admin/admin.php');
			}
		}
		else {
			header('Location: connexion');
		}
	}
}