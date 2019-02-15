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
	      		<li class="nav-item"><a class="nav-link" href="newchapitres">Nouveau chapitre</a></li>
				<li class="nav-item"><a class="nav-link" href="chapitres">Chapitres</a></li>
	      		<li class="nav-item"><a class="nav-link" href="commentaires">Commentaires</a></li>
	      		<li class="nav-item"><a class="nav-link" href="modération">Modération</a></li> 		
	      	</ul>
	    </div>
	  </nav>
	</div>
	<main>
		<?= $content ?>
	</main>
</body>
</html>