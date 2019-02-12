<?php

namespace App\Controller\Report;

use App\Model\CommentManager;
use App\Model\Comment;


class ReportController
{
	public function report(Comment $commentId)
	{
		$reported = new CommentManager();
		$result = $reported->report($commentId);
		require ('src/View/report/report.php');
	}
}