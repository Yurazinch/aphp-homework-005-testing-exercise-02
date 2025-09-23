<?php

declare(strict_types=1);

//namespace Yuraz\Exercise02\UserTableWrapper;

class UserTableWrapper
{
    private array $rows;

    /**
     * @param array|[column => row_value] $values
     */
    
    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }
}