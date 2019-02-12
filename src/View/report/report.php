<?php
ob_start();
?>

<?php header('Location: roman'); ?>

<?php
$content = ob_get_clean();
?>