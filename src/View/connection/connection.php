<?php
ob_start();
?>

<form class="text-white" action="tryconnection" method="post">
	<p>
		<label for="nickname">Pseudo :</label>
		<input type="text" name="nickname" /></br>
		<label for="password">Mot de passe :</label>
		<input type="password" name="password"/></br>
		<input type="submit" value="Valider"/>
	</p>
</form>
<a href="mot-de-passe-oublie">Mot de passe oublié ?</a>

<?php
$content = ob_get_clean();
require('src/View/template.php');
?>