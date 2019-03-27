<?php

namespace App\Controller\AddContact;


use App\Model\Contact;
use App\Model\ContactManager;


class AddContactController
{
	public function addcontact($email, $sujet, $message, $boolnews, $rgpd)
	{
		$cont = new Contact();
		$cont->setEmail($email);
		$cont->setSujet($sujet);
		$cont->setMessage($message);
		$cont->setBoolnews($boolnews);
		$cont->setRgpd($rgpd);
		$contactManager = new ContactManager();
		$contactManager->addContact($cont);
		$_SESSION['flash'] = 'Votre message a bien été envoyé.';
		$flash = $_SESSION['flash'];
		header('Location: contact');
	}
}