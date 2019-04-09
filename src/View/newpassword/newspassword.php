<?php
ob_start();
?>

<form action="changepasswordmail" class="m-2" method="post">
	<div class="form-group">
		<label class="text-white" for="email">E-mail :</label>
	    <input name="email" type="text" class="form-control" id="email" required>
  	</div>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 </form>



<?php
$content = ob_get_clean();
require('src/View/template.php');
?>