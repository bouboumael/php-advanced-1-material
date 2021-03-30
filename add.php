<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $data = array_map('trim', $_POST);
    $errors = [];
    $maxString = ['title'=> 255, 'description' => 200];
    foreach ($data as $input => $text) {
        if (empty($data[$input])) {
            $errors[] = $input . ': doit être rempli';
        } elseif (strlen($text) > $maxString[$input]){
            $errors[] = $input . ' ne doit pas dépasser ' . $maxString[$input] .' charactères';
        } else {
            $data[$input] = htmlentities($text);
        }
    }

    $recipe = $data;

    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /');
    }
}

require __DIR__ . '/src/views/form.php';