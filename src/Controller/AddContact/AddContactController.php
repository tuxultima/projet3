<?php

namespace App\Controller\AddContact;


use App\Model\Contact;
use App\Model\ContactManager;


class AddContactController
{
	public function addcontact($email, $sujet, $message, $boolnews)
	{
		$cont = new Contact();
		$cont->setEmail($email);
		$cont->setSujet($sujet);
		$cont->setMessage($message);
		$cont->setBoolnews($boolnews);
		$contactManager = new ContactManager();
		$contactManager->addContact($cont);
		$_SESSION['flash'] = 'Votre message a bien été envoyé.';
		$flash = $_SESSION['flash'];
		header('Location: contact');
	}
}