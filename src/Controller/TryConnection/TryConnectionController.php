<?php

namespace App\Controller\TryConnection;

use App\Model\UserManager;
use App\Model\User;

class TryConnectionController
{
	public function tryconnection($nickname)
	{
		$tryconnection = new UserManager();
		$result = $tryconnection->getConnection($nickname);
		$truepseudo = $result->getNickname();
		$truepassword = $result->getPassword();
		$pseudo = $_POST['nickname'];
		$pass = $_POST['password'];
		if ($truepseudo = $pseudo && $truepassword = $pass) {
			session_start();
			$SESSION['id'] = $result->getId();
			$SESSION['nickname'] = $result->getNickname();
			header('Location: administration');
		}
		else
		{
			header('Location: connexion');
		}
		require('src/View/tryconnection/tryconnection.php');
	}
}