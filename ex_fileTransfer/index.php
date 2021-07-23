<?php 
var_dump($_FILES);

function upload($FILE) {

	$authorizedExtensions = [
		'png',
		'gif',
		'jpg',
		'jpeg'
	];

	$sizeLimitMo = 1;

	if (isset($FILE['file'])) {
	// S'il n'y a pas d'erreur on enregistre le fichier avec la bonne extension
	if ($FILE['file']['error'] === UPLOAD_ERR_OK) {
		if ($FILE['file']['size'] <= $sizeLimitMo * (1024 ** 2)){
			$type = explode('/', $FILE['file']['type']);
			$extension = $type[1];
			$filename = uniqid() . ".$extension";
	
			// Enregistrement du fichier dans mon dossier img
				if (in_array($extension, $authorizedExtensions)){
					move_uploaded_file($FILE['file']['tmp_name'], "img/$filename");
					header("Location: ./galery.php");
				}
				else {
					echo "L'éxtension de votre fichier n'est pas supportée par notre service. Utilisez plutôt .png / .gif / .jpg / .jpeg";
				}
		}
		else {
			echo 'Votre fichier est trop grand. Nous limitons à 1mo par fichier.';
		}
	} elseif ($FILE['file']['error'] === UPLOAD_ERR_NO_FILE) {
		echo "Aucun fichier à télécharger";
	}
}};

upload($_FILES);

require 'index.phtml';
