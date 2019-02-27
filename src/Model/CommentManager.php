<?php

namespace App\Model;

use \PDO;

class CommentManager extends DbManager
{
	private $db;

	public function __construct()
	{
		$this->db = self::connect();
	}

	public function comment($postId)
	{
		$req = $this->db->query('SELECT id, nickname, comment, dateUpload, chapter_id, reported, moderate FROM comment WHERE chapter_id = ? ORDER BY dateUpload');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		$req->execute(array($postId));
		$comment = [];
		$objChapter = new Comment($data);
		$comment[] = $objComment;
		return $comment;
	}

	public function report(Comment $commentId)
	{
		$req = $this->db->prepare('UPDATE comment SET reported = 1 WHERE id = ?');
		$req->execute(array($commentId->getId()));
		return $commentId;
	}

	public function getreported()
	{
		$req = $this->db->query('SELECT id, nickname, comment, dateUpload, chapter_id, reported, moderate FROM comment WHERE reported = 1 ORDER BY dateUpload');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$comments = [];
		foreach ($result as $data) 
		{
			$objComments = new Comment($data);
			$comments[] = $objComments;
		}
		return $comments;
	}

	public function getcomment()
	{
		$req = $this->db->query('SELECT id, nickname, comment, dateUpload, chapter_id, reported, moderate FROM comment ORDER BY dateUpload');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$comments = [];
		foreach ($result as $data) 
		{
			$objComments = new Comment($data);
			$comments[] = $objComments;
		}
		return $comments;
	}


	public function censor(Comment $commentId)
	{
		$req = $this->db->prepare('UPDATE comment SET moderate = 1 WHERE id = ?');
		$req->execute(array($commentId->getId()));
		return $commentId;
	}

}