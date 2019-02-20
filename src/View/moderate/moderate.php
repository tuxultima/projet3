<?php
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<div class="reported">
	<p>
		<p><?= $data->getNickname(); ?></p>
		crée le <?= $data->getDateUpload(); ?>
	</p>

	<p>
		<?= $data->getComment(); ?>
	</p>
</div>
<?php
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>