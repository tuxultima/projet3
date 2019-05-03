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
				header('Location: administration');
			}
			else {
			header('Location: connexion');
		}
		}
		else {
			header('Location: connexion');
		}
	}
}