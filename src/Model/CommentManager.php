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

	/**
	* report one comment get by id
	* @return CommentId
	*/
	public function report(Comment $commentId)
	{
		$req = $this->db->prepare('UPDATE comment SET reported = 1 WHERE id = ?');
		$req->execute(array($commentId->getId()));
		return $commentId;
	}

	/**
	* get all comments reported order by dateUpload
	* @return Comments
	*/
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

	/**
	* get all comments order by dateUpload
	* @return Comments
	*/
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

	/**
	* censor one comment get by id
	* @return CommentId
	*/
	public function censor(Comment $commentId)
	{
		$req = $this->db->prepare('UPDATE comment SET moderate = 1 WHERE id = ?');
		$req->execute(array($commentId->getId()));
		return $commentId;
	}

	/**
	* agreed one comment get by id
	* @return CommentId
	*/
	public function agree(Comment $commentId)
	{
		$req = $this->db->prepare('UPDATE comment SET moderate = 0, reported = 0 WHERE id = ?');
		$req->execute(array($commentId->getId()));
		return $commentId;
	}

	/**
	* get all censored comments order by dateUpload
	* @return Comments
	*/
	public function getblacklist()
	{
		$req = $this->db->query('SELECT id, nickname, comment, dateUpload, chapter_id, reported, moderate FROM comment WHERE moderate = 1 ORDER BY dateUpload');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$comments = [];
		foreach ($result as $data) 
		{
			$objComments = new Comment($data);
			$comments[] = $objComments;
		}
		return $comments;
	}

	/**
	* add one comment
	* @return Add
	*/
	public function addcomment(Comment $comment)
	{
		$req = $this->db->prepare('INSERT INTO comment (nickname, comment, dateUpload, reported, moderate, chapter_id) VALUES(:nickname, :comment, NOW(), 0, 0, :chapter_id)');
		$add = $req->execute(array(
			'nickname'=>$comment->getNickname(),
			'comment'=>$comment->getComment(),
			'chapter_id'=>$comment->getChapter_Id()
		));
		return $add;
	}

	/**
	* get all comments order by dateUpload with limit of 3 comments
	* @return Comments
	*/
	public function getCommentLimit()
	{
		$req = $this->db->query('SELECT id, nickname, comment, dateUpload, chapter_id, reported, moderate FROM comment ORDER BY dateUpload LIMIT 0,3');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$comments = [];
		foreach ($result as $data) 
		{
			$objComments = new Comment($data);
			$comments[] = $objComments;
		}
		return $comments;
	}
}