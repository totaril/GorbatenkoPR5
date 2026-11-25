<?php
$students = [
    ['name' => 'Анна', 'grade' => 4.5],
    ['name' => 'Борис', 'grade' => 3.2],
    ['name' => 'Вера', 'grade' => 4.8],
    ['name' => 'Глеб', 'grade' => 2.9],
];

// по убыванию оценки: сравниваю b с a
usort($students, fn($a, $b) => $b['grade'] <=> $a['grade']);
echo implode("\n", array_map(fn($s) => "{$s['name']} — {$s['grade']}", $students)) . "\n\n";

// сортирую копию по алфавиту, чтобы рейтинг не потерять
$byName = $students;
usort($byName, fn($a, $b) => strcmp($a['name'], $b['name']));
echo implode("\n", array_map(fn($s) => "{$s['name']} — {$s['grade']}", $byName)) . "\n\n";

// функция возвращает функцию, $limit запоминается во внутренней fn
$greaterThan = fn($limit) => fn($student) => $student['grade'] > $limit;

$best = array_filter($students, $greaterThan(4.0));
echo implode(', ', array_map(fn($s) => $s['name'], $best)) . "\n";
echo "Количество: " . count($best) . "\n";