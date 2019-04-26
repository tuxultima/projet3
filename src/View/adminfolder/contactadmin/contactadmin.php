<?php
ob_start();
?>
<?php
foreach ($results as $data)
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
		
		<?php
		if ($data->getBoolnews() == true) {
			?>
			<p>Cette utilisateur souhaite se désinscrire de la newsletter.<a class="float-right" href="processedcontact&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir mettre ce message en lu et traité ?')">lu et traité</a></p>
		<?php
		}
		else {
			?>
			<p>Cette utilisateur est pas inscrit ou ne souhaite pas de désinscrire de la newsletter.<a class="float-right" href="processedcontact&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir mettre ce message en lu et traité ?')">lu et traité</a></p>
		<?php
		}
		?>
		
	</div>
	<?php
	} 
	else {
		?>
		<div class="contactadmin2 rounded mt-3 mb-3 ">
			
			<p>
				<p><?= $data->getEmail(); ?></p>
			</p>

			<p>
				<?= $data->getSujet(); ?>
			</p>

			
			<p><?= $data->getMessage(); ?></p>

			<?php
		if ($data->getBoolnews() == true) {
			?>
			<p>Cette utilisateur souhaite se désinscrire de la newsletter.</p>
		<?php
		}
		else {
			?>
			<p>Cette utilisateur est pas inscrit ou ne souhaite pas de désinscrire de la newsletter.</p>
		<?php
		}
		?>
		</div>
	<?php
	}
	?>


<?php
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>