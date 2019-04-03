<?php

namespace App\Controller\AdminFolder\ContactAdmin;

use App\Model\UserManager;
use App\Model\User;
use App\Model\ContactManager;
use App\Model\Contact;


class ContactAdminController
{
	/**
  	* get contact by id
  	*/
	public function contactadmin()
	{
		$contacts = new ContactManager();
		$results = $contacts->getContacts();
		$user = new UserManager();
		$result = $user->getConnected();
		$userid = $result->getId();
		$usernickname = $result->getNickname();
		if ($_SESSION['id'] == $userid && $_SESSION['nickname'] == $usernickname) {
		require('src/View/adminfolder/contactadmin/contactadmin.php');
		}
		else{
			header('Location:connexion');
		}
	}
}