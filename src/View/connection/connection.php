<?php
ob_start();
?>
<form action="tryconnection" method="post">
	<p>
		<label for="nickname.s">Pseudo :</label>
		<input type="text" name="nickname.s" /></br>
		<label for="password.s">Mot de passe :</label>
		<input type="password" name="password.s"/></br>
		<input type="submit" value="Valider">
	</p>
</form>
<?php
$content = ob_get_clean();
?>