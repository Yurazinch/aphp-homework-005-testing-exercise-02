<?php

declare(strict_types=1);

namespace Yuraz\Exercise02;

class UserTableWrapper
{
    protected array $rows;

    /**
     * @param array|[column => row_value] $values
     */
    
    public function insert(array $values): void
    {
        $this->rows[] = $values;
    }
}