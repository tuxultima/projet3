<?php 

namespace App\Controller\Home;


class HomeController{

	/**
  	* render the home page
  	*/
	public function home(){
		require('src/View/home/home.php');
	}
}