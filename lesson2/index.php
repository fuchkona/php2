<?php
define('HOME', __DIR__);

spl_autoload_register(function ($className) {
    require_once HOME . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
});

use classes\DigitalGood;
use classes\Good;
use classes\PieceGood;
use classes\Single;
use classes\WeightGood;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 2 by Nik</title>
</head>
<body>
<h2>Задание 1</h2>
<hr>
<h3>Штучный товар товар</h3>
<?php
$pieceGood = new PieceGood(70.74, 3);
?>
<pre><?php var_dump($pieceGood); ?></pre>
<p>Цена: 70.74</p>
<p>Количество: 3</p>
<p>Цена: = <?= $pieceGood->getCost(); ?></p>
<hr>
<h3>Цифровой товар</h3>
<?php
$digitalGood = new DigitalGood(70.74, 3);
?>
<pre><?php var_dump($digitalGood); ?></pre>
<p>Цена: 70.74</p>
<p>Количество: 3</p>
<p>Цена: = <?= $digitalGood->getCost(); ?></p>
<hr>
<h3>Весовой товар</h3>
<?php
$weightGood = new WeightGood(70.74, 3.27);
?>
<pre><?php var_dump($weightGood); ?></pre>
<p>Цена: 70.74</p>
<p>Количество: 3.27</p>
<p>Цена: = <?= $weightGood->getCost(); ?></p>
<hr>
<h2>Задание 2</h2>
<?php
$single1 = Single::getInstance();
$single2 = Single::getInstance();
$single3 = Single::getInstance();
?>
<pre><?php var_dump($single1) ?></pre>
<pre><?php var_dump($single2) ?></pre>
<pre><?php var_dump($single3) ?></pre>
<pre><?php var_dump($single1 === $single2) ?></pre>
<pre><?php var_dump($single2 === $single3) ?></pre>
<pre><?php var_dump($single1 === $single3) ?></pre>
</body>
</html>