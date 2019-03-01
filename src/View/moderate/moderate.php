<?php
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<?php if ($data->getReported() == true && $data->getModerate() == false) {
		?>
<div class="reported rounded text-black mt-3 mb-3 p-1 bg-warning">
	
	<p>
		<p><?= $data->getNickname(); ?></p>
	</p>

	<p>
		<?= $data->getComment(); ?>
	</p>
	<p class="float-right p-1"><a href="agree&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir rendre ce commentaire comme non signalé ?')">autoriser</a></p>
	<em>crée le <?= $data->getDateUpload(); ?></em>
	<p class="float-right p-1"> <a href="censor&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir modérer ce commentaire ?')">modérer</a></p>
</div>
<?php
}
?>
<?php
}
?>
<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>