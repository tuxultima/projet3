<?php
ob_start();
?>
<?php
if ($results) {


foreach ($results as $data)
{
?>
<div class="newsletteradmin rounded mt-3 mb-3 ">
	

		<p><?= $data->getEmail(); ?><a class="float-right" href="deletenewsletter&id=<?= $data->getId(); ?>">supprimer</a></p>

</div>
<?php
}
}
else {
	echo "Vous n'avez pas encore d'email inscrit à la newsletter";
}
?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>