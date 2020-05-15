<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>
    <h1>Произошла ошибка</h1>
    <p><b>Код: </b><?= $errno ?></p>
    <p><b>Текст: </b><?= $errstr ?></p>
    <p><b>Файл: </b><?= $errfile ?></p>
    <p><b>Строка: </b><?= $errline ?></p>
</body>
</html>
