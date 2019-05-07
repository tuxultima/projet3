<?php 
ob_start();
?>


<div class="passwordformfront rounded mt-3 mb-3 border border-info">
	<p>Le mot de passe doit contenir obligatoirement une majuscule et un chiffre.</p>
 <form action="updatepassword" class="m-2" method="post">	
    <div class="form-group">
    	<input type='hidden' name='token' value='<?= $user->getPasswordToken(); ?>' />
        <label class="text-white" for="password">Votre nouveau mot de passe :</label>
        <input name="password" type="password" class="form-control" id="password" required>
        <label class="text-white" for="password2">Veuillez confirmer votre mot de passe :</label>
        <input name="password2" type="password" class="form-control" id="password2" required>
    </div>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 </form>
</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>