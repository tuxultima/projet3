<?php
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<?php if ($data->getReported() == true && $data->getModerate() == true) {
		?>
<div class="reported rounded text-black mt-3 mb-3 p-1 bg-danger">
	
	<p>
		<p><?= $data->getNickname(); ?></p>
	</p>

	<p>
		<?= $data->getComment(); ?>
	</p>
	<p class="float-right p-1"><a href="agree&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir rendre ce commentaire comme non signalé ?')">autoriser</a></p>
	<em>crée le <?= $data->getDateUpload(); ?></em>
	
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