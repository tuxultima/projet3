<?php 
ob_start();
?>



<div class="chapter rounded text-white mt-3 mb-3 text-center">
	<p>
		<?= $result->getTitle(); ?>
	</p>

	<p>
		<?= $result->getContent(); ?>
	</p>
	<em>crée le <?= $result->getDateUpload(); ?></em>
</div>

<p class="text-white" >commentaires</p>


	
	<?php
	foreach ($result->getComments() as $data)
	{
		?>
		<?php if ($data->getModerate() == false) {
			?>
			<div class="comment rounded text-white mt-4 mb-4 p-1 border border-info">

		<p> <?= $data->getNickname(); ?></p>
		<p> <?= $data->getComment(); ?> </p>
		<em> le <?= $data->getDateUpload(); ?> </em>
		<?php 
		if ($data->getReported() == false) {
			?>
			<p class="float-right"> <a href="report&id=<?= $data->getId(); ?>&chapter-id=<?= $result->getId(); ?>">report</a></p>
			<?php
		}
		 ?>
		</div>
		<?php
		}
			else {
				?>
				<div class="comment rounded text-white mt-4 mb-4 p-1 border border-info">
					<p> <?= $data->getNickname(); ?></p>
					<p class="text-white">ce commentaire a etait censuré</p>
				</div>
				<?php
		}
	}
	?>






<?php
$content = ob_get_clean();
require('src/View/template.php');
?>