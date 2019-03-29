<?php

namespace App\Controller\TryConnection;


class ResetPasswordController
{
	public function changePasswordMailForm() {
		require etc;
	}

	public function changePasswordMail() {
		$token = uniqid('conf', true);
		header();
	}

	public function changePasswordForm() {
		require etc;

	}

	public function updatePassword() {
		header();
	}
}