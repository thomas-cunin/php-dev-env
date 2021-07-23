<?php 
var_dump($_GET);
if (isset($_GET['orderNumber'])) : ?>
    <p> Vous êtes sur la page <?= $_GET['id'] ?> </p>
<?php else : ?>
    <p>Erreur</p>
<?php endif; ?>