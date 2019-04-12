<?php 
ob_start();
?>


<div class="passwordformfront rounded mt-3 mb-3 border border-info">
 <form action="updatepassword" class="m-2" method="post">	
    <div class="form-group">
        <label class="text-white" for="password">Votre nouveau mot de passe :</label>
        <input name="password" type="text" class="form-control" id="password" required>
        <label class="text-white" for="password2">Veuillez confirmer votre mot de passe :</label>
        <input name="password2" type="text" class="form-control" id="password2" required>
    </div>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 </form>
</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>