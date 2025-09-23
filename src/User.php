<?php

declare(strict_types=1);

//namespace Yuraz\Exercise02\User;
//require 'vendor/autoload.php';

require_once ('UserTableWrapper.php');
require_once ('TableWrapperInterface.php');

class User extends UserTableWrapper implements TableWrapperInterface
{
    public function insert(array $values): void
    {
        if(count($values) === count($rows[0])) {
            $this->rows[] = $values;
        } else {
            echo 'Значения не совпадают со столбцами';
        }
    }
    public function update(int $id, array $values): array
    {
        if(($id !== 0) && (count($values) === count($rows[0]))) {
            $rows[$id] = $values;
        } elseif (($id !== 0) && (count($values) === 2)) {
            $key = array_search($values[0], $rows[0]);
            $rows[$key] = $values[1];
        } else {
            echo 'Значения не соответствуют таблице';
        }  
        return $rows[$id];  
    }
    public function delete(int $id): void
    {
        if(($id !== 0) && (count($values) === count($rows[0]))) {
            array_splice($rows, $id, 1);
        }
    }
    public function get(): array
    {
        return $rows;
    }
}   
