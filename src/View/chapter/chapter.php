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
		<?php 
		if ($data->getReported() == false) {
			?>
			<p> <a href="report&id=<?= $data->getId(); ?>&chapter-id=<?= $result->getId(); ?>">report</a></p>
			<?php
		}
		 ?>
		
		<?php
	}
	?>

</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>