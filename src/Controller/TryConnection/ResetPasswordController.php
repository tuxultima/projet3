<?php

namespace App\Controller\TryConnection;

use App\Model\User;
use App\Model\UserManager;
use App\Service\ResetPasswordMail;

class ResetPasswordController
{
	public function changePasswordMailForm() {
		require etc;
	}

	public function changePasswordMail($email) {
		$userManager = new UserManager;
		$user = $userManager->//fonction trouvez lutilisateur par son mail
		if ($user) {
		$token = uniqid('conf', true);
		$user->setToken($token);
		$userManager->//fonction pour ajouter le token en base de donnée et la date NOW pour datetoken
		$reset = new ResetPasswordMail();
		$reset->sendResetMail($token);
		header('Location: changepasswordform');
		}
		else {
			header('Location: changepasswordform');
		}
		
	}

	public function changePasswordForm() {
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