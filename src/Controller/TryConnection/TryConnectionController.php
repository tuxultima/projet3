<?php

namespace App\Controller\TryConnection;

use App\Model\UserManager;
use App\Model\User;

class TryConnection
{
	public function tryconnection()
	{
		$tryconnection = new UserManager();
		if ($tryconnection->getNickname() = $_POST['nickname.s'] && $tryconnection->getPassword() = $_POST['password.s']) {
			session_start();
			$SESSION['id'] = $tryconnection->getId();
			$SESSION['nickname'] = $tryconnection->getNickname();
			header('Location: administration');
		}
		else()
		{
			header('Location: connexion')
		}
		require('src/View/tryconnection/tryconnection.php');
	}
}