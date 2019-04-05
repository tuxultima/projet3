<?php 

namespace App\Controller\Home;

use App\Service\Mail;

class HomeController{

	/**
  	* render the home page
  	*/
	public function home(){
		require('src/View/home/home.php');
	}
	public function send(){
		$mail = new Mail();
		$mail->sendMail();
		header('Location: accueil');
	}
}