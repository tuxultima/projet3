<?php

namespace App\Model;

use \PDO;

class ContactManager extends DbManager
{
	private $db;

	public function __construct()
	{
		$this->db = self::connect();
	}

	public function addContact(Contact $contact)
	{
		$req = $this->db->prepare('INSERT INTO contact (email, sujet, message, boolnews) VALUES(:email, :sujet, :message, :boolnews)');
		$add = $req->execute(array(
			'email'=>$contact->getEmail(),
			'sujet'=>$contact->getSujet(),
			'message'=>$contact->getMessage(),
			'boolnews'=>$contact->getBoolnews()
		));
		return $add;
	}

	public function getContacts()
	{
		$req = $this->db->query('SELECT id, email ,sujet, message, boolnews FROM contact ORDER BY id');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			
		
			$contact = [];
			foreach ($result as $data )
			{
				$objcontact = new Contact($data);
				$contact[] = $objcontact;
			}
			return $contact;
		}
		return false;
	}
}