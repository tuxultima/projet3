<?php

namespace App\Controller\AdminFolder\DeleteContact;

use App\Model\ContactManager;
use App\Model\Contact;


class DeleteContactController
{
	public function deleteContact(Contact $contact)
	{
		$deleteContact = new ContactManager();
		$result = $deleteContact->deleteContact($contact);
		header('Location:contactadmin');
	}
}