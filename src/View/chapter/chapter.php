<?php 
ob_start();
?>



<div class="chapter">
	<p>
		<?= $results->getTitle(); ?>
		crée le <?= $results->getDateUpload(); ?>
	</p>

	<p>
		<?= $results->getContent(); ?>
	</p>
</div>

<div class="comment">
	<p>commentaires</p>
	<?php
	while ($results2 = $results2->fetch())
	{
		?>
		<p> <?= $results2->getNickname(); ?> le <?= results2->getDateUpload(); ?> </p>
		<p> <?= $results2->getComment(); ?> </p>
		<?php
	}
	?>

</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>