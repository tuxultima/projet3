<?php
ob_start();
?>
<?php
foreach ($results as $data)
{
?>
<div class="contactadmin rounded mt-3 mb-3 ">
	
	<p>
		<p><?= $data->getEmail(); ?></p>
	</p>

	<p>
		<?= $data->getSujet(); ?>
	</p>

	
	<p><?= $data->getMessage(); ?></p>
	

	<p><?= $data->getBoolnews(); ?><a class="float-right" href="deletecontact&id=<?= $data->getId(); ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ce message ?')">supprimer</a></p>


</div>
<?php
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>