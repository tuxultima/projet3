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
		$req = $this->db->prepare('INSERT INTO contact (email, sujet, message, boolnews, rgpd) VALUES(:email, :sujet, :message, :boolnews, :rgpd)');
		$add = $req->execute(array(
			'email'=>$contact->getEmail(),
			'sujet'=>$contact->getSujet(),
			'message'=>$contact->getMessage(),
			'boolnews'=>$contact->getBoolnews(),
			'rgpd'=>$contact->getRgpd()
		));
		return $add;
	}

	public function getContacts()
	{
		$req = $this->db->query('SELECT id, email ,sujet, message, boolnews, rgpd FROM contact ORDER BY id');
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

	public function deleteContact(Contact $contact)
	{
		$req = $this->db->prepare('DELETE FROM contact WHERE id = :id');
		$delete = $req->execute(['id'=>$contact->getId()]);
		return $delete;
	}
}