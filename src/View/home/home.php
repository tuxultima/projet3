<?php 
ob_start();
?>

<h1>acceuil</h1>



<?php 
$content = ob_get_clean();
require('src/View/template.php');
?>