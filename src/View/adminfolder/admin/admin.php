<?php
ob_start();
?>

<div class="container">
  <div class="row">
    <div class="col-sm">
     	<div class="commentadmin rounded mt-3 mb-3 p-1">
     		<p>Vos derniers commentaires recu :</p>
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
      <div class="contactadmin rounded mt-3 mb-3 p-1">
     		<p>Vous avez <?=  $resultsContactNumber; ?> messages non lus et traités :</p>
      </div>
      	<?php
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
			?>
    </div>
  </div>
</div>


<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>