<?php

namespace App\Controller\AdminFolder\ProcessedContact;

use App\Model\ContactManager;
use App\Model\Contact;


class ProcessedContactController
{
	/**
  	* processed contact by id
  	*/
	public function processedContact(Contact $contact)
	{
		$processedContact = new ContactManager();
		$result = $processedContact->processedContact($contact);
		header('Location:contactadmin');
	}
}