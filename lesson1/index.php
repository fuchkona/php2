<?php
define('HOME', __DIR__);

spl_autoload_register(function ($class_name) {
    require_once HOME . '\\' . $class_name . '.php';
});

use classes\Dvd;
use classes\Good;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 1 by Nik</title>
</head>
<body>
<h2>Задание 1,2,3</h2>
<pre>
        <?php
        $good = new Good();
        $good->setTitle("Товар 1");
        $good->setDescription("Описание товара");
        $good->setPrice(50.27);
        var_dump($good);
        ?>
</pre>
<hr>
<h2>Задание 4</h2>
<pre>
    <?php
    $dvd = new Dvd();
    $dvd->setTitle("Звездные войны");
    $dvd->setDescription("Давным давно, в далекой далекой галактике бушевали звездные войны...");
    $dvd->setPrice(127.30);
    $dvd->setDuration(5400);
    $dvd->setLang('RUru');
    $dvd->setProducer("Джордж Лукас");
    var_dump($dvd);
    ?>
</pre>
<hr>
<h2>Задание 5</h2>
<p>Описание в коде</p>
<pre>
    <?php

    class A
    {
        public function foo()
        {
            // Переменная статическая и относится ко всему классу.
            // П.С. не думаю что объявлять статичные переменные внутри метода хорошая идея... Поправьте меня если я не прав.
            static $x = 0;

            // Префиксный инкремент, сначала наращиваем на 1 потом выводим.
            echo ++$x;
        }
    }

    $a1 = new A(); // Создается первый экземпляр класса А
    $a2 = new A(); // Создается второй экземпляр класса А
    $a1->foo(); // 1 - Статичная переменная создалась (0), увеличенась на 1 и вывелась (1)
    $a2->foo(); // 2 - Статичная переменная увеличалась на 1 и вывелась
    $a1->foo(); // 3 - Статичная переменная увеличалась на 1 и вывелась
    $a2->foo(); // 4 - Статичная переменная увеличалась на 1 и вывелась
    ?>
</pre>
<hr>
<h2>Здание 6</h2>
<p>Описание в коде</p>
<pre>
    <?php

    class A2
    {
        public function foo()
        {
            static $x = 0;
            echo ++$x;
        }
    }

    class B2 extends A2
    {
        // В PHP, при наследовании статичной переменной, создается ее дубликат поэтому у B2 есть копия переменной $x.
    }

    $a1 = new A2(); // Создается первый экземпляр класса А2
    $b1 = new B2(); // Создается первый экземпляр класса B2
    $a1->foo(); // 1 - Создается статичная переменная класса А2 (0), увелививается на 1 и выводится (1)
    $b1->foo(); // 1 - Создается статичная переменная класса B2 (0), увелививается на 1 и выводится (1)
    $a1->foo(); // 2 - Статичная переменная класса А2 увеличивается на 1 и выводится
    $b1->foo(); // 2 - Статичная переменная класса В2 увеличивается на 1 и выводится
    ?>
</pre>
<hr>
<h2>Задание 7</h2>
<p>Возможно здесь какая-то ошибка в методичке, но я не вижу различий между 6 и 7 заданием.</p>
<pre>
    <?php

    class A3
    {
        public function foo()
        {
            static $x = 0;
            echo ++$x;
        }
    }

    class B3 extends A3
    {
    }

    $a1 = new A3;
    $b1 = new B3;
    $a1->foo();
    $b1->foo();
    $a1->foo();
    $b1->foo();
    ?>
</pre>
</body>
</html>