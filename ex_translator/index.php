<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El Traductor 3000</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css" />
</head>

<body>
    <main>
        <h1 class="title is-1">El Traductor 3000</h1>
        <h3 class="subtitle is-3">Traducteur de "mot" et "ordinateur" depuis 1920</h3>
        <div class="columns">
            <div class="column is-4">
                <form method="post" class="box" action="translate.php">
                    <div class="field">
                        <label class="label">Original</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="" name="content">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <div class="select">
                                <select name="direction">
                                    <option value="toEnglish">Français > Anglais</option>
                                    <option value="toFrench">Anglais > Français</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="column">
                <?php
                if (isset($_POST['content'], $_POST['direction'])) :

                    $traduction = translate($_POST['content'], $_POST['direction']); ?>

                    <img src="<?= imageUrl($_POST['direction']) ?>" width="100px" height="100px" />
                    <p class="is-size-3"><?= $_POST['content'] ?> : <?= $traduction ?></p>

                <?php endif;



                ?>
            </div>
        </div>
    </main>
</body>

</html>