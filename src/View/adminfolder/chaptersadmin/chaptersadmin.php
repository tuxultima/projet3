<?php
ob_start();
?>
<?php
foreach ($results as $data)
{
?>
<div class="chapteradmin rounded mt-3 mb-3 text-center">
	<p>
		<p><?= $data->getTitle(); ?></p>
	</p>

	<p>
		<?= $data->getContent(); ?>
	</p>
	
	<em>crée le <?= $data->getDateUpload(); ?>

	<div class="text-right "><a href="deletechapitre&id=<?= $data->getId(); ?>">supprimer </a>
	<a href="updatechapitre&id=<?= $data->getId(); ?>">modifier</a></div></em>
</div>
<?php
}

?>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>