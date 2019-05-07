<?php 
ob_start();
?>

<h1 class="text-white">Erreur 404 - Page inexistante</h1>
<p class="text-white">Il semblerait que la page à laquelle vous souhaitez accéder n'existe pas.</p>
<a href="accueil">Retourner à l'accueil</a>


<?php 
$content = ob_get_clean();
require('src/View/template.php');
?>