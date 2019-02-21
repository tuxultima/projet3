<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../projet3/public/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../../projet3/public/css/other.css">
	<title>projet 3</title>
</head>
<body>
	<div class="container">
      <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      	<div class="container-fluid">
	      	<ul class="nav navbar-nav">
	      		<li class="nav-item"><a class="nav-link" href="nouveauchapitre">Nouveau chapitre</a></li>
				<li class="nav-item"><a class="nav-link" href="chapitresadmin">Chapitres</a></li>
	      		<li class="nav-item"><a class="nav-link" href="commentairesadmin">Commentaires</a></li>
	      		<li class="nav-item"><a class="nav-link" href="modération">Modération</a></li> 		
	      	</ul>
	    </div>
	  </nav>
	
	<main>
		<?= $content ?>
	</main>
	<footer class="bg-primary text-white  ">
		<div class="container-fluid text-center text-md-left ">
			<div class="row">
				<div  class="col-md-9">
					<a class="b" href="accueil">Accueil site</a>
				</div>
			</div>
		</div>
	</footer>
	</div>
</body>
</html>