<?php 
ob_start();
?>

<?php



foreach ($results as $data)
{
?>
<div class="chapter">
	<p>
		<?= $data->getTitle(); ?>
		crée le <?= $data->getDateUpload(); ?>
	</p>

	<p>
		<?= $data->getContent(); ?>
	</p>
</div>
<?php
}

?>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>