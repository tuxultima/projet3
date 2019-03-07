<!DOCTYPE html>
<html>
<head>
	<script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
  
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../projet3/public/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../../projet3/public/css/other.css">
	<title>projet 3</title>
</head>
<body class="greymode">
	<div class="container">
      <nav class="navbar rounded-bottom  navbar-expand-sm bg-primary navbar-dark">
      	<div class="container-fluid">
	      	<ul class="nav navbar-nav">
	      		<li class="nav-item"><a class="nav-link text-white" href="nouveauchapitre">Nouveau chapitre</a></li>
				<li class="nav-item"><a class="nav-link text-white" href="chapitresadmin">Chapitres</a></li>
	      		<li class="nav-item"><a class="nav-link text-white" href="commentairesadmin">Commentaires</a></li>
	      		<li class="nav-item"><a class="nav-link text-white" href="moderation">Modération</a></li> 		<li class="nav-item"><a class="nav-link text-white" href="commentairemoderer">Commentaires modérer</a></li>
	      	</ul>
	    </div>
	  </nav>
	
	<main>
		<?= $content ?>
	</main>
	<footer class="bg-primary rounded ">
		<div class="container-fluid text-center text-md-left ">
			<div class="row">
				<div  class="col-md-9">
					<a class="text-white" href="accueil">Accueil site</a>
				</div>
			</div>
		</div>
	</footer>
	</div>
</body>
</html>