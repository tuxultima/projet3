<?php
ob_start();
?>

<form action="addchapter" class="m-2" method="post">
	<div class="form-group">
		<label for="title">Titre :</label>
    <input name="title" type="text" class="form-control" id="title">
  	</div>
  	<label for="content">Chapitre :</label>
    <textarea name="content"  id="content"></textarea>
    <button type="submit" class="btn btn-primary m-1" >Envoyer</button>
 </form>
 
 <script>
  	tinymce.init({
    selector: '#content',
    language: 'fr_FR',
    resize: false,
    height: 700
  	});
  	</script>

<?php
$content = ob_get_clean();
require ('src/View/templateadmin.php');
?>