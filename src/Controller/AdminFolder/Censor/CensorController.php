<?php

namespace App\Controller\AdminFolder\Censor;

use App\Model\CommentManager;
use App\Model\Comment;


class CensorController
{
	public function censor(Comment $commentId)
	{
		$censored = new CommentManager();
		$result = $censored->censor($commentId);
		header('Location: moderation');
	}
}