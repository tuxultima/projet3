<?php
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<div class="commentadmin rounded mt-3 mb-3">
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