<?php
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<div class="reported rounded text-black mt-3 mb-3 bg-warning">
	<p>
		<p><?= $data->getNickname(); ?></p>
	</p>

	<p>
		<?= $data->getComment(); ?>
	</p>
	<em>crée le <?= $data->getDateUpload(); ?></em>
</div>
<?php
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>