<?php
// четыре стрелочные функции, тело — одно выражение, return не нужен
$square = fn(int $n): int => $n ** 2;
$isEven = fn(int $n): bool => $n % 2 === 0;
$greet = fn(string $name): string => "Привет, $name!";
$max = fn(float $a, float $b): float => $a > $b ? $a : $b;

echo $square(4) . "\n";
echo $square(9) . "\n";

echo ($isEven(10) ? 'true' : 'false') . "\n";
echo ($isEven(7) ? 'true' : 'false') . "\n";

echo $greet('Иван') . "\n";
echo $greet('Мария') . "\n";

echo $max(3, 8) . "\n";
echo $max(15, 2) . "\n";

// тот же квадрат классической анонимной функцией:
// $square = function (int $n): int {
//     return $n ** 2;
// };
// было 3 строки с function, скобками и return, стало одна строка с fn