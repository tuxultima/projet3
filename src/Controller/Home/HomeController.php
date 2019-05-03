<?php 

namespace App\Controller\Home;

use App\Model\ChapterManager;
use App\Model\Chapter;

class HomeController{

	/**
  	* render the home page
  	*/
	public function home(){
		$chapters = new ChapterManager();
		$resultsChap = $chapters->getChapterLimit();
		$chapters2 = new ChapterManager();
		$resultsChap2 = $chapters2->getChapterLimit2();
		require('src/View/home/home.php');
	}
}