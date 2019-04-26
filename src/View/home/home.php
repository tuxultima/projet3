<?php 
ob_start();
?>

<!--<h1 class="text-white">Accueil</h1>-->

<p class="text-white carousel-caption">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at ligula elementum, dapibus orci sed, volutpat lacus. In hac habitasse platea dictumst. Maecenas velit arcu, pretium vel efficitur non, imperdiet in dolor. Nullam consectetur  vestibulum ante dignissim eu. Ut est leo, aliquet vitae sapien sit amet, viverra ultrices magna. Integer vel pellentesque massa. Aenean id consectetur nibh, id lacinia purus. Phasellus cursus a nunc in ullamcorper. In hac habitasse platea dictumst. </p>

<div class="container">
	<div class="row">
		<div class="col-sm">
			<div class="chapter rounded mt-3 mb-3 p-1">
	     		<p class="text-white">Les deux derniers chapitres sortis :</p>
	     	</div>
	    </div>
	</div>
  <div class="row">
    <div class="col-sm">
     	<?php
     	foreach ($resultsChap as $data)
		{
		?>
     	<div class="chapter text-white rounded mt-3 mb-3 p-1">
			<p>
				<p><?= $data->getTitle(); ?></p>
			</p>

			<p>
				<?= $data->getContent(); ?>
			</p>

			
		</div>
		<?php
		}
		?>
    </div>
    <div class="col-sm">
    	<?php
     	foreach ($resultsChap2 as $data)
		{

		?>
      <div class="chapter text-white rounded mt-3 mb-3 p-1">
     		<p>
				<p><?= $data->getTitle(); ?></p>
			</p>

			<p>
				<?= $data->getContent(); ?>
			</p>
      </div>
      	<?php
		}
		?>
    </div>
  </div>
</div>

<div class="border border-info">
<img src="../../projet3/public/image/alaska_picture.png" class="img-fluid" alt="Responsive image">
</div>


<?php 
$content = ob_get_clean();
require('src/View/template.php');
?>