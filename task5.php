<?php
$orders = [
    ['id' => 1, 'customer' => 'Иван', 'total' => 1200, 'status' => 'done'],
    ['id' => 2, 'customer' => 'Мария', 'total' => 800, 'status' => 'new'],
    ['id' => 3, 'customer' => 'Пётр', 'total' => 3500, 'status' => 'done'],
    ['id' => 4, 'customer' => 'Анна', 'total' => 600, 'status' => 'cancelled'],
    ['id' => 5, 'customer' => 'Олег', 'total' => 2100, 'status' => 'done'],
];

// выручка: сначала отобрал выполненные, потом сложил
$done = array_filter($orders, fn($o) => $o['status'] === 'done');
$revenue = array_reduce($done, fn($sum, $o) => $sum + $o['total'], 0);
echo "Выручка по выполненным: $revenue руб.\n\n";

// заказы дороже 1000
$big = array_filter($orders, fn($o) => $o['total'] > 1000);
echo implode("\n", array_map(
    fn($o) => "Заказ №{$o['id']} — {$o['total']} руб. ({$o['customer']})",
    $big
)) . "\n\n";

// самый дорогой выполненный: сортирую копию и беру первый
$sortedDone = $done;
usort($sortedDone, fn($a, $b) => $b['total'] <=> $a['total']);
$top = $sortedDone[0];
echo "Самый дорогой выполненный: №{$top['id']} — {$top['total']} руб. ({$top['customer']})\n\n";

// имена клиентов без повторов
$clients = array_unique(array_map(fn($o) => $o['customer'], $orders));
echo "Клиенты: " . implode(', ', $clients) . "\n\n";

$cancelled = array_filter($orders, fn($o) => $o['status'] === 'cancelled');

echo "Всего заказов: " . count($orders) . "\n";
echo "Выполнено: " . count($done) . "\n";
echo "Отменено: " . count($cancelled) . "\n";
echo "Сумма выручки: $revenue руб.\n";