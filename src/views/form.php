<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'enregistrement de recette</title>
</head>
<body>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $message): ?>
                <li><?= $message ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>   
    <form action="" method="POST">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" required placeholder="Iles flottantes">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" placeholder="3 eggs"></textarea>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>