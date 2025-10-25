<?php

declare(strict_types=1);

require_once ('vendor/autoload.php');

use Yuraz\Exercise02\User;
use Yuraz\Exercise02\UserTableWrapper;
use Yuraz\Exercise02\TableWrapperInterface;

$user = new User;

$user->insert(['name' => 'Иван', 'surname' => 'Иванов']);
$user->insert(['name' => 'Петр', 'surname' => 'Петров']);    
$user->insert(['name' => 'Сидор', 'surname' => 'Сидоров']);

print_r($user->get());

$user->update(1, ['name' => 'Фёдор', 'surname' => 'Фёдоров']);

print_r($user->get());

$user->delete(1);

$result = $user->get();

echo "{$result[0]['name']} {$result[1]['surname']}";