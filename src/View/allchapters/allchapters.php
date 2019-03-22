<?php 
ob_start();
?>

<?php




foreach ($results as $data)
{
?>
<div class="chapter rounded border border-info text-white mt-3 mb-3 text-center">
	<h3 >
		<a class="a2"  href="chapitre&id=<?= $data->getId(); ?>"><?= $data->getTitle(); ?></a>	
	</h3>

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