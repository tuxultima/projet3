<?php 
ob_start();
?>

<?php if (isset($_SESSION['flash'])) : ?>
<div><p class="text-white"><?= $_SESSION['flash']; ?></p></div>
<?php unset($_SESSION['flash']); endif; ?>


<div class="contactfront rounded mt-3 mb-3 border border-info">
<form action="addcontact" class="m-2" method="post">
	<div class="form-group">
		<label class="text-white" for="email">E-mail :</label>
    	<input name="email" type="text" class="form-control" id="email" required>
    	<label class="text-white" for="sujet">Sujet :</label>
    	<input  name="sujet" type="text" class="form-control" id="sujet" required>
    	<label class="text-white" for="message">Message :</label>
    	<textarea rows="5" class="form-control" name="message"  id="message" required></textarea>
    	<div class="form-check text-white">
        <input type="hidden" id="boolnews0" class="form-check-input" name="boolnews" value="0">
    	<input type="checkbox" id="boolnews" class="form-check-input" name="boolnews" value="1">
    	<label class="form-check-label" for="boolnews">Je souhaite me désinscrire de la newsletter.</label>
        <br>
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