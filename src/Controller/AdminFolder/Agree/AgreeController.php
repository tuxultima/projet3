<?php

namespace App\Controller\AdminFolder\Agree;

use App\Model\CommentManager;
use App\Model\Comment;


class AgreeController
{
	/**
  	* agree comment by id
  	*/
	public function agree(Comment $commentId)
	{
		$agreed = new CommentManager();
		$result = $agreed->agree($commentId);
		header('Location: moderation');
	}
}