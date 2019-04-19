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

	public function changePasswordMail(User $user) {
		$userManager = new UserManager;
		$getUser = $userManager->getEmailAccount($user);
		if ($getUser->getEmail() != null && $user->getEmail() == $getUser->getEmail()) {
		
			if ($getUser) {
			$token = uniqid('conf', true);
			$getUser->setPasswordToken($token);
			$userManager->addToken($getUser);
			$reset = new ResetPasswordMail();
			$reset->sendResetMail($token);
			header('Location: mot-de-passe-oublie');
			}
			else {
				header('Location: mot-de-passe-oublie');
			}
		}
	}

	public function changePasswordForm($token) {
		$userManager = new UserManager;
		$user = $userManager->getTokenAccount($token);
		$newDateTime = new \DateTime(date('Y-m-d H:i'));
		$tokenDate = $user->getTokenAddDate()->diff($newDateTime);
		var_dump($tokenDate);die;
		if ($user == null) {
			echo "acces interdit";
		}
		elseif ($tokenDate->i > 30) {
			echo "acces interdit";
		}
		require ('src/View/adminfolder/changepasswordform/changepasswordform.php');
	}

	public function updatePassword($password, $token) {
		$userManager = new UserManager;
		$user = $userManager->getTokenAccount($token);
		$tokenDate = $user->getDateToken()->diff(new \DateTime());
		if ($user == null) {
			echo "acces interdit";
		}
		elseif ($tokenDate->i > 30) {
			echo "acces interdit";
		}
		$passwordsafe = password_hash($password, PASSWORD_BCRYPT);
		$passwordsafe = new User();
		$passwordsafe->setPassword($passwordsafe);
		$userManager = new UserManager();
		$userManager->updatingPassword($passwordsafe);
		header('Location: connexion');
	}
}