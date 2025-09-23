<?php 

declare(strict_types=1);

//namespace Yuraz\Exercise02;
//require 'vendor\autoload.php';

require_once ('User.php');

$user = new User;

$user->insert(['Name', 'Surname', 'Phone', 'Email']);

print_r($rows);