<?php

namespace App\Controller\Censor;

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