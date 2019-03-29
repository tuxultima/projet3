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

	// fonction pour supprimer un mail inscrit à la newsletter
	public function deleteNewsletter(Newsletter $newsletter)
	{
		$req = $this->db->prepare('DELETE FROM newsletter WHERE id = :id');
		$delete = $req->execute(['id'=>$newsletter->getId()]);
		return $delete;
	}

	// fonction pour ajouter un mail à la newsletter
	public function addnewsletter(Newsletter $newsletter)
	{
		$req = $this->db->prepare('INSERT INTO newsletter (email, rgpd) VALUES(:email, :rgpd)');
		$add = $req->execute(array(
			'email'=>$newsletter->getEmail(),
			'rgpd'=>$newsletter->getRgpd()
		));
		return $add;
	}

}