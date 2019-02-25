<?php 
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<div class="chapter rounded text-white mt-3 mb-3 text-center">
	<p>
		<a href="chapitre&id=<?= $data->getId(); ?>"><?= $data->getTitle(); ?></a>	
	</p>

	<p>
		<?= $data->getContent(); ?>
	</p>
	<em>crée le <?= $data->getDateUpload(); ?></em>
</div>
<?php
}

?>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>