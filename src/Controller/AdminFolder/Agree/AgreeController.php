<?php

namespace App\Controller\AdminFolder\Agree;

use App\Model\CommentManager;
use App\Model\Comment;


class AgreeController
{
	public function agree(Comment $commentId)
	{
		$agreed = new CommentManager();
		$result = $agreed->agree($commentId);
		header('Location: moderation');
	}
}