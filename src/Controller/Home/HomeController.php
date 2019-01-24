<?php 

namespace App\Controller\Home;

class HomeController{

	public function home(){
		require('src/View/home/home.php');
	}

	public function novel(){
		require('src/View/home/novel.php');
	}

	public function whoami(){
		require('src/View/home/whoami.php');
	}

	public function newsletters(){
		require('src/View/home/newsletters.php');
	}

	public function contact(){
		require('src/View/home/contact.php');
	}
}