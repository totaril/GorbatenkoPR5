<?php
$discount = 0.9;

// $discount захватывается автоматически, use писать не нужно
$applyDiscount = fn(float $price): float => $price * $discount;

echo $applyDiscount(1000) . "\n";
echo $applyDiscount(2500) . "\n";

$discount = 0.5;
echo $applyDiscount(1000) . "\n"; // снова 900, а не 500

// fn захватывает переменную по значению в момент создания функции,
// то есть внутрь попала копия 0.9, и изменение $discount на неё не влияет

$rate = 95.5;
// тут сразу две внешние переменные: курс и текущая скидка (0.5)
$toRubles = fn(float $usd): float => $usd * $rate * $discount;

echo $toRubles(100) . "\n";
echo $toRubles(20) . "\n";