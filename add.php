<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = array_map('trim', $_POST);
    $errors = [];
    $inputs = ['title', 'description'];
    $maxString = ['title'=> 255, 'description' => 2000];
    foreach ($recipe as $input => $text) {
        if (!in_array($input, $inputs)){
            $errors[] = 'le champs ' . $input . ' n\'existe pas petit malin!!!';
        }elseif (empty($recipe[$input])) {
            $errors[] = $input . ': doit être rempli';
        } elseif (strlen($text) > $maxString[$input]){
            $errors[] = $input . ' ne doit pas dépasser ' . $maxString[$input] .' charactères';
        } else {
            $recipe[$input] = htmlentities($text);
        }
    }

    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /');
    }
}

require __DIR__ . '/src/views/form.php';