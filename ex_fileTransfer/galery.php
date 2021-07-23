<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El Uploader 3000</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.css" />
    <link rel="stylesheet" href="https://bulma.io/vendor/fontawesome-free-5.15.2-web/css/all.min.css" />
</head>

<body>
    <main>
        <h1 class="title is-1">Notre galerie d'images</h1>
        <h3 class="subtitle is-3"><a href="./index.php">Uploader un fichier</a></h3>
        <div class="columns is-multiline">
            <?php
            $dir = './img';
            $dirContents = scandir($dir);
            
            for ($i = 2; $i < count($dirContents); $i++) { ?>
                <div class="column is-4">
                    <img src=" <?php echo $dir.'/'.$dirContents[$i] ?>" />
                </div>
            <?php }
            ?>

        </div><?php var_dump($dirContents); ?>
    </main>
</body>

</html>