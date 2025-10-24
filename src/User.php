<?php

declare(strict_types=1);

namespace Yuraz\Exercise02;

use Yuraz\Exercise02\UserTableWrapper;
use Yuraz\Exercise02\TableWrapperInterface;

class User extends UserTableWrapper implements TableWrapperInterface
{
    protected array $rows;

    public function insert(array $values): void
    {        
        if(!is_array( $values ) || (!count( $values ) > 0))
        {
            throw new \Exception('Нет данных для добавления');                            
        }
       
        $this->rows = $values;
    }

    public function update(int $id, array $values): array
    {
        if(array_key_exists($id, $this->rows))
        {
            $this->rows[$id] = array_replace($this->rows[$id], $values);
            return $this->rows[$id];
        }
        else
        {
            throw new \Exception('Строки не существует');
        }
          
    }

    public function delete(int $id): void
    {
        if(array_key_exists($id, $this->rows)) {
            $this->rows = array_splice($this->rows, $id, 1);
        }
        else
        {
            throw new \Exception('Строки не существует');
        }
    }

    public function get(): array
    {
        return $this->rows;
    }
}   
