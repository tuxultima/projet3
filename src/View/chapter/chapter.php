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

<p class="text-white" >Commentaires</p>






	<form action="addcomment" class="m-2" method="post">
		<?php $result->getComments();
		 ?>
		<input type='hidden' name='chapter_id' value='<?= $result->getId(); ?>' />
	<div class="form-group col">
		<div class="col-xs-3">
		<label for="nickname" class="text-white">Pseudonyme :</label>
    <input name="nickname" type="text" class="form-control" id="nickname">
    </div>
  	
  	<label for="comment" class="text-white">Message :</label><br>
    <textarea class="form-control" name="comment"  id="comment"></textarea>
	</div>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 	</form>
	
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
			<p class="float-right"> <a href="report&id=<?= $data->getId(); ?>&chapter-id=<?= $result->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir signaler ce commentaire ?')">report</a></p>
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
					<em class="text-white">ce commentaire a etait censuré</em>
				</div>
				<?php
		}
	}
	?>






<?php
$content = ob_get_clean();
require('src/View/template.php');
?>