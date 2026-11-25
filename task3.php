<?php
$products = [
    ['title' => 'Книга', 'price' => 500],
    ['title' => 'Рюкзак', 'price' => 2500],
    ['title' => 'Кружка', 'price' => 350],
    ['title' => 'Наушники', 'price' => 4200],
    ['title' => 'Блокнот', 'price' => 150],
];

// превращаю каждый товар в строку
$lines = array_map(fn($p) => "{$p['title']} — {$p['price']} руб.", $products);
echo implode("\n", $lines) . "\n\n";

// оставляю только дорогие товары
$expensive = array_filter($products, fn($p) => $p['price'] > 1000);
echo implode(', ', array_map(fn($p) => $p['title'], $expensive)) . "\n\n";

// сворачиваю массив в сумму
$total = array_reduce($products, fn($sum, $p) => $sum + $p['price'], 0);
echo "Общая стоимость: $total руб.\n\n";

// новый массив со скидкой 15%, исходный не меняется
$discounted = array_map(
    fn($p) => array_merge($p, ['price' => round($p['price'] * 0.85, 2)]),
    $products
);
echo implode("\n", array_map(fn($p) => "{$p['title']} — {$p['price']} руб.", $discounted)) . "\n";