<?php 
ob_start();
?>

<?php if (isset($_SESSION['flash'])) : ?>
<div><p class="text-white"><?= $_SESSION['flash']; ?></p></div>
<?php unset($_SESSION['flash']); endif; ?>


<div class="newsletterfront rounded mt-3 mb-3 border border-info">
<form action="addnewsletter" class="m-2" method="post">
	<div class="form-group">
		<label class="text-white" for="email">E-mail :</label>
    <input name="email" type="text" class="form-control" id="email">
  	</div>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 </form>
</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>