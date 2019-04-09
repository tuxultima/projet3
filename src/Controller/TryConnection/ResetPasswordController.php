<?php

namespace App\Controller\TryConnection;

use App\Model\User;
use App\Model\UserManager;
use App\Service\ResetPasswordMail;

class ResetPasswordController
{
	public function changePasswordMailForm() {
		require ('src/View/newpassword/newpassword.php');
	}

	public function changePasswordMail(User $email) {
		$userManager = new UserManager;
		$user = $userManager->getEmailAccount($email);
		if ($user['email'] != null && $email->getEmail() == $user['email']) {
		
			if ($user) {
			$token = uniqid('conf', true);
			$user->setToken($token);
			$userManager->updatingToken($user);
			$reset = new ResetPasswordMail();
			$reset->sendResetMail($token);
			header('Location: nouveau-mot-de-passe');
			}
			else {
				header('Location: nouveau-mot-de-passe');
			}
		}
	}

	public function changePasswordForm($token) {
		//chercher le token en base de donnée
		$tokenDate = $user->getDateToken()->diff(new \DateTime());
		if ($user == null) {
			echo "acces interdit";
		}
		elseif ($tokenDate->i > 30) {
			echo "acces interdit";
		}
		require ('src/View/changepasswordform/changepasswordform.php');
	}

	public function updatePassword($password, $token) {
		//chercher le token en base de donnée
		$tokenDate = $user->getDateToken()->diff(new \DateTime());
		if ($user == null) {
			echo "acces interdit";
		}
		elseif ($tokenDate->i > 30) {
			echo "acces interdit";
		}
		$password = new User();
		$password->setPassword($password);
		$userManager = new UserManager();
		$userManager->updatingPassword($password);
	}
}