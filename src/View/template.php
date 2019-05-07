<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../projet3/public/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../../projet3/public/css/other.css">
	<title>Billet simple pour l'Alaska</title>
</head>
<body class="darkmode">
	<div class="container">
      <nav class="navbar rounded-bottom navbar-expand-sm bg-dark navbar-dark">
      	<div class="container-fluid">
	      	<ul class="nav navbar-nav">
	      		<li class="nav-item"><a class="nav-link" href="accueil">Accueil</a></li>
	      		<li class="nav-item"><a class="nav-link" href="roman">Roman</a></li>
	      		<li class="nav-item"><a class="nav-link" href="quisuisje">Qui suis-je</a></li>
	      		<li class="nav-item"><a class="nav-link" href="newsletters">Newsletters</a></li>
	      		<li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
	      	</ul>
	    </div>
	  </nav>
	     	
    
	<main>
		<?= $content ?>
	</main>
	<footer class="bg-dark rounded text-white  ">
		<div class="container-fluid text-center text-md-left ">
			<div class="row">
				<div  class="col-md-9">
					<a class="a" href="mentions">Mentions légales</a>
				</div>

				<div  class="col-md-3 nav-item text-right">
					<?php
					if (isset($_SESSION['id']) == NULL) {
					?>
					<a class="a" href="connexion">Connexion</a>
					<?php
					}
					else
					{
					?>
					<a class="a" href="administration">Accueil administration</a>
					<?php
					}
					?>

				</div>
			</div>
		</div>
	</footer>
	</div>
</body>
</html>