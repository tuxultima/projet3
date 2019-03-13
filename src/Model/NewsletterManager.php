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
	

	public function getNewsletter()
	{
		$req = $this->db->query('SELECT id, email FROM newsletter ORDER BY id');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$newsletter = [];
		foreach ($result as $data )
		{
			$objNewsletter = new Newsletter($data);
			$newsletter[] = $objNewsletter;
		}
		return $newsletter;
	}

	public function deleteNewsletter(Newsletter $newsletter)
	{
		$req = $this->db->prepare('DELETE FROM newsletter WHERE id = :id');
		$delete = $req->execute(['id'=>$newsletter->getId()]);
		return $delete;
	}

	public function addnewsletter(Newsletter $newsletter)
	{
		$req = $this->db->prepare('INSERT INTO newsletter (email) VALUES(:email)');
		$add = $req->execute(array(
			'email'=>$newsletter->getEmail(),
		));
		return $add;
	}

}