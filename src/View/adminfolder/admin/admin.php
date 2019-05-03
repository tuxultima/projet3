<?php
ob_start();
?>

<div class="container">
  <div class="row">
    <div class="col-sm">
     	<div class="commentadmintitle text-center mt-3 mb-3 p-1">
     		<strong>Vos derniers commentaires recu :</strong>
     	</div>
     	<?php
     	foreach ($resultsCom as $data)
		{
		?>
     	<div class="commentadmin rounded mt-3 mb-3 p-1">
			<p>
				<p><?= $data->getNickname(); ?></p>
			</p>

			<p>
				<?= $data->getComment(); ?>
			</p>

			
			<em>crée le <?= $data->getDateUpload(); ?></em>
		</div>
		<?php
		}
		?>
    </div>
    <div class="col-sm">
      <div class="contactadmintitle text-center mt-3 mb-3 p-1">
     		<strong>Vous avez <?=  $resultsContactNumber; ?> messages non lus et traités :</strong>
      </div>
      	<?php
      		if ($resultsContact) {
			foreach ($resultsContact as $data)
			{
			?>
			<?php if ($data->getProcessed() == false) {
			?>
				<div class="contactadmin rounded mt-3 mb-3 ">
					
					<p>
						<p><?= $data->getEmail(); ?></p>
					</p>

					<p>
						<?= $data->getSujet(); ?>
					</p>

					
					<p><?= $data->getMessage(); ?></p>
				</div>
				<?php
			}
			}
			}
			else {
				echo "Vous n'avez pas de messages non lus et traités dans votre boite de reception";
			}
			?>
    </div>
  </div>
</div>


<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>