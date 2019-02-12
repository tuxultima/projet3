<?php 
ob_start();
?>



<div class="chapter">
	<p>
		<?= $result->getTitle(); ?>
		crée le <?= $result->getDateUpload(); ?>
	</p>

	<p>
		<?= $result->getContent(); ?>
	</p>
</div>

<div class="comment">
	<p>commentaires</p>
	<?php
	foreach ($result->getComments() as $data)
	{
		?>
		<p> <?= $data->getNickname(); ?> le <?= $data->getDateUpload(); ?> </p>
		<p> <?= $data->getComment(); ?> </p>
		<p> <a href="report&id=<?= $data->getId(); ?>">report</a></p>
		<?php
	}
	?>

</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>