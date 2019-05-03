<?php
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<?php if ($data->getModerate() == false) {
?>
<div class="commentadmin rounded mt-3 mb-3 p-1">
	<p>
		<p><?= $data->getNickname(); ?></p>
	</p>

	<p>
		<?= $data->getComment(); ?>
	</p>

	
	<em>crée le <?= $data->getDateUpload(); ?></em>
	<p class="float-right p-1"> <a href="censor&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir modérer ce commentaire ?')">modérer</a></p>
</div>
<?php
}
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>