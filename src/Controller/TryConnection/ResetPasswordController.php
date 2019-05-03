<?php

namespace App\Controller\TryConnection;

use App\Model\User;
use App\Model\UserManager;
use App\Service\ResetPasswordMail;

class ResetPasswordController
{
	/**
  	* render the newpassword page
  	*/
	public function changePasswordMailForm() {
		require ('src/View/newpassword/newpassword.php');
	}

	/**
  	* set token and send mail
  	*/
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

	/**
  	* compare token and render the changepasswordform page
  	*/
	public function changePasswordForm($token) {
		$userManager = new UserManager;
		$user = $userManager->getTokenAccount($token);
		$date = new \DateTime($user->getTokenAddDate());
		$tokenDate = $date->diff(new \DateTime());
		if ($user == null) {
			echo "acces interdit";
		}
		elseif ($tokenDate->i > 30) {
			echo "acces interdit";
		}
		require ('src/View/adminfolder/changepasswordform/changepasswordform.php');
	}

	/**
  	* compare token and update password admin account
  	*/
	public function updatePassword(User $user) {
		$userManager = new UserManager;
		$checkUser = $userManager->getTokenAccount($user);
		$date = new \DateTime($checkUser->getTokenAddDate());
		$tokenDate = $date->diff(new \DateTime());
		if ($user == null) {
			echo "acces interdit";
		}
		elseif ($tokenDate->i > 30) {
			echo "acces interdit";
		}
		$passwordsafe = password_hash($user->getPassword(), PASSWORD_BCRYPT);
	
		$checkUser->setPassword($passwordsafe);
		
		$userManager->updatingPassword($checkUser);
		header('Location: connexion');
	}
}