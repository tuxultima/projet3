<?php

namespace App\Model;

use \PDO;


class NewsletterManager extends DbManager
{
	private $db;

	public function __construct()
	{
		$this->db = self::connect();
	}
	
	// fonction pour afficher les email ajouter à la newsletter
	/**
	* get all email order by id
	* @return newsletter
	*/
	public function getEmail()
	{
		$req = $this->db->query('SELECT id, email, rgpd FROM newsletter ORDER BY id');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			
		
			$newsletter = [];
			foreach ($result as $data )
			{
				$objNewsletter = new Newsletter($data);
				$newsletter[] = $objNewsletter;
			}
			return $newsletter;
		}
		return false;
	}

	/**
	* delete one email get by id
	* @return delete
	*/
	public function deleteNewsletter(Newsletter $newsletter)
	{
		$req = $this->db->prepare('DELETE FROM newsletter WHERE id = :id');
		$delete = $req->execute(['id'=>$newsletter->getId()]);
		return $delete;
	}

	/**
	* add one email
	* @return Add
	*/
	public function addnewsletter(Newsletter $newsletter)
	{
		$req = $this->db->prepare('INSERT INTO newsletter (email, rgpd) VALUES(:email, :rgpd)');
		$add = $req->execute(array(
			'email'=>$newsletter->getEmail(),
			'rgpd'=>$newsletter->getRgpd()
		));
		return $add;
	}

	public function getOtherEmail()
	{
		$req = $this->db->query('SELECT email FROM newsletter ORDER BY id');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			
		
			$newsletter = [];
			foreach ($result as $data )
			{
				$objNewsletter = new Newsletter($data);
				$newsletter[] = $objNewsletter;
			}
			return $newsletter;
		}
		return false;
	}

}