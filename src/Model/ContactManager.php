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

	/**
	* add one contact
	* @return Add
	*/
	public function addContact(Contact $contact)
	{
		$req = $this->db->prepare('INSERT INTO contact (email, sujet, message, boolnews, rgpd, processed) VALUES(:email, :sujet, :message, :boolnews, :rgpd, 0)');
		$add = $req->execute(array(
			'email'=>$contact->getEmail(),
			'sujet'=>$contact->getSujet(),
			'message'=>$contact->getMessage(),
			'boolnews'=>$contact->getBoolnews(),
			'rgpd'=>$contact->getRgpd()
		));
		return $add;
	}

	/**
	* get all contact get by id order by id
	* @return Contact
	*/
	public function getContacts()
	{
		$req = $this->db->query('SELECT id, email ,sujet, message, boolnews, rgpd, processed FROM contact ORDER BY id DESC');
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

	/**
	* processed one contact get by id
	* @return Contact
	*/
	public function processedContact(Contact $contact)
	{
		$req = $this->db->prepare('UPDATE contact SET processed = 1 WHERE id = ?');
		$req->execute(array($contact->getId()));
		return $contact;
	}

	/**
	* get contact order by id with limit of 3 contacts
	* @return Contact
	*/
	public function getContactsLimit()
	{
		$req = $this->db->query('SELECT id, email ,sujet, message, boolnews, rgpd, processed FROM contact WHERE processed = 0 ORDER BY id DESC LIMIT 0,3');
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

	/**
	* get number of contact where processed = 0
	* @return result
	*/
	public function getContactNumber()
	{
		$req = $this->db->query('SELECT COUNT(processed = 0) AS newMsj FROM contact');
		$result = $req->fetchColumn();

		return $result;
	}
}