<?php

namespace App\Controller\TryConnection;

use App\Model\UserManager;
use App\Model\User;

class TryConnectionController
{
	/*public function tryconnection($nickname)
	{
		$tryconnection = new UserManager();
		$result = $tryconnection->getConnection($nickname);
		$truepseudo = $result->getNickname();
		$truepassword = $result->getPassword();
		$pseudo = $_POST['nickname'];
		$pass = $_POST['password'];
		$pass = hash('sha512', $pass);
		
		if ($truepseudo == $pseudo && $truepassword == $pass) {
			$_SESSION['id'] = $result->getId();
			$_SESSION['nickname'] = $result->getNickname();
			header('Location:administration');
		}

		else
		{
			header('Location: connexion');
		}
		require('src/View/tryconnection/tryconnection.php');
	}*/

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