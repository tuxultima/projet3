<?php 
ob_start();
?>

<?php if (isset($_SESSION['flash'])) : ?>
<div><p class="text-white"><?= $_SESSION['flash']; ?></p></div>
<?php unset($_SESSION['flash']); endif; ?>


<div class="newsletterfront rounded mt-3 mb-3 border border-info">
	<h2 class="text-white m-1">Venez vous inscrire a ma newsletter !</h2>
	<p class="text-white m-1">Soyez informés à la sortie de chaque nouveau chapitre.</p>
<form action="addnewsletter" class="m-2" method="post">
	<div class="form-group">
		<label class="text-white" for="email">E-mail :</label>
	    <input name="email" type="text" class="form-control" id="email" required>
	    <div class="form-check text-white">
	    <input type="checkbox" class="form-check-input" name="rgpd" id="rgpd" value="1" checked required>
	    <label class="form-check-label" for="rgpd">J'ai bien pris compte de l'envoie de mes données personnel dans les conditions d'utilisations.</label>
		</div>
  	</div>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 </form>
</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>