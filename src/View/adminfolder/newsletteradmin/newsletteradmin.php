<?php
ob_start();
?>
<?php
foreach ($results as $data)
{
?>
<div class="newsletteradmin rounded mt-3 mb-3 ">
	

		<p><?= $data->getEmail(); ?><a class="float-right" href="deletenewsletter&id=<?= $data->getId(); ?>">supprimer</a></p>

</div>
<?php
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>