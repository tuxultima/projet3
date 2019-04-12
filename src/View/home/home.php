<?php 
ob_start();
?>

<h1 class="text-white">accueil</h1>


<?php 
$content = ob_get_clean();
require('src/View/template.php');
?>