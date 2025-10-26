<?php 

declare(strict_types=1);

namespace Yuraz\Exercise02\UserInsertTest;

use Yuraz\Exercise02\User;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class UserInsertTest extends TestCase
{
    private User $user;
    public int $n = 0;

    protected function setUp(): void 
    {
        $this->user = new User;
    }
    
    #[DataProvider('providerInsert')]
    public function testInsert(array $values, int|string $expected)
    {
        $this->expectExceptionMessage('Нет данных для добавления');
        $this->user->insert($values);
        $result = $this->user->get();
        $this->assertEquals($expected, $result[0]['surname']);
        $n++;
    }
    public static function providerInsert()
    {
        return [
            'test1' => [['name' => 'Иван', 'surname' => 'Иванов'], 'Иванов'],
            'test2' => [['name' => 'Петр', 'surname' => 'Петров'], 'Петров'],
            'test3' => [['name' => 'Сидор', 'surname' => 'Сидоров'], 'Сидоров'],
            'test4' => [[], 'Нет данных для добавления'],        
        ];
    } 
    
    
}