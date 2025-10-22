<?php

declare(strict_types=1);

//namespace Yuraz\Exercise02\User;

//use Yuraz\Exercise02\UserTableWrapper;
//use Yuraz\Exercise02\TableWrapperInterface;

require_once ('UserTableWrapper.php');
require_once ('TableWrapperInterface.php');

class User extends UserTableWrapper implements TableWrapperInterface
{
    protected array $rows;

    public function insert(array $values): void
    {        
        if(!is_array($values) || empty($value))
        {
            alert('Нет строки для добавления');                            
        }
       
        $this->rows = $values;
    }

    public function update(int $id, array $values): array
    {
        if(isset($id))
        {
            $this->rows[$id] = array_replace($this->rows[$id], $values);
            return $this->rows[$id];
        }
        else
        {
            alert('Строки не существует');
        }
          
    }

    public function delete(int $id): void
    {
        if(isset($id)) {
            $this->rows = array_splice($rows, $id, 1);
        }
        else
        {
            alert('Строки не существует');
        }
    }

    public function get(): array
    {
        return $this->rows;
    }
}   
