<?php

namespace App\Controller\Report;

use App\Model\CommentManager;
use App\Model\Comment;


class ReportController
{
	/**
  	* report comment by id
  	*/
	public function report(Comment $commentId, $chapterId)
	{
		$reported = new CommentManager();
		$result = $reported->report($commentId);
		header('Location: chapitre&id=' . $chapterId);
	}
}