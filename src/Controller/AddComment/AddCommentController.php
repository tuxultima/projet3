<?php

namespace App\Controller\AddComment;


use App\Model\Comment;
use App\Model\CommentManager;


class AddCommentController
{
	public function addcomment($nickname, $comment, $chapter_id)
	{
		$com = new Comment();
		$com->setNickname($nickname);
		$com->setComment($comment);
		$com->setChapter_Id($chapter_id);
		$commentManager = new CommentManager();
		$commentManager->addcomment($com);
		header('Location: roman');
	}
}