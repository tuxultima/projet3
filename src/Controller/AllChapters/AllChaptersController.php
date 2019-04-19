<?php

namespace App\Controller\AllChapters;

use App\Model\ChapterManager;

class AllChaptersController
{
	/**
  	* get chapters by id
  	*/
	public function allchapters()
	{
		$chapter = new ChapterManager();
		$results = $chapter->getChapters();
		require('src/View/allchapters/allchapters.php');
	}
}