<?php

namespace App\Controller\AddComment;


use App\Model\Comment;
use App\Model\CommentManager;


class AddCommentController
{
	/**
	* add new comment in database
	*/
	public function addcomment($nickname, $comment, $chapter_id)
	{
		$com = new Comment();
		$com->setNickname($nickname);
		$com->setComment($comment);
		$com->setChapter_Id($chapter_id);
		$commentManager = new CommentManager();
		$commentManager->addcomment($com);
		$_SESSION['flash'] = 'Votre commentaire a bien été publié.';
		$flash = $_SESSION['flash'];
		header('Location: chapitre&id='.$chapter_id);
	}
}