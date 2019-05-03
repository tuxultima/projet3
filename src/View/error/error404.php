<?php 
ob_start();
?>

<h1>Erreur 404 - Page inexistante</h1>
<p>Il semblerait que la page à laquelle vous souhaitez accéder n'existe pas.</p>
<a href="accueil">Retourner à l'accueil</a>


<?php 
$content = ob_get_clean();
require('src/View/template.php');
?>