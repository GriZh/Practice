<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['background_color'])) {
        setcookie('background_color', $_POST['background_color'], time() + (86400 * 30), '/');
    }
    if (isset($_POST['background_image'])) {
        setcookie('background_image', $_POST['background_image'], time() + (86400 * 30), '/');
    }
}

$backgroundColor = isset($_COOKIE['background_color']);

if ($backgroundColor = isset($_COOKIE['background_color'])) {
    $backgroundColor = $_COOKIE['background_color'];
} else {
    $backgroundColor = '#ffffff';
}
$backgroundImage = isset($_COOKIE['background_image']);

if ($backgroundImage = isset($_COOKIE['background_image'])) {
    $backgroundImage = $_COOKIE['background_image'];
} else {
    $backgroundImage = '';
}
;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор фона</title>
    <style>
        body {
            transition: background-color 0.5s, background-image 0.5s;
            background-color:
                <?= $backgroundColor ?>
            ;
            background-image:
                <?= $backgroundImage ? "url('$backgroundImage')" : 'none' ?>
        }
    </style>
</head>

<body>
    <h1>Выберите фон</h1>
    <form method="POST" id="backgroundForm">
        <label for="color">Цвет фона:</label>
        <input type="color" id="color" name="background_color" value="<?= $backgroundColor ?>"
            onchange="this.form.submit();">

        <br><br>

        <label for="image">URL изображения:</label>
        <input type="text" id="image" name="background_image" value="<?= $backgroundImage ?>"
            onchange="this.form.submit();">
    </form>
</body>

</html>