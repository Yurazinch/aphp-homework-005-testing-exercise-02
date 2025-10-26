<?php 

declare(strict_types=1);

namespace Yuraz\Exercise02\UserDeleteTest;

use Yuraz\Exercise02\User;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class UserDeleteTest extends TestCase
{
    private User $user;

    protected function setUp(): void 
    {
        $this->user = new User;
    }

    #[DataProvider('providerDelete')]
    public function testDelete(int $id, int|string $expected)
    {
        $this->user->insert(['name' => 'Иван', 'surname' => 'Иванов']);
        $this->user->insert(['name' => 'Петр', 'surname' => 'Петров']);
        $this->user->insert(['name' => 'Сидор', 'surname' => 'Сидоров']);   
        
        $this->expectExceptionMessage('Строки не существует');
        $this->user->delete($id);
        $result = $this->user->get();
        $toString = "{$result[0]['name']} {$result[1]['surname']}";
        $this->assertEquals($expected, $toString);
    }
    public static function providerDelete()
    {
        return [
            'test1' => [9, 'Строки не существует'],
            'test2' => [1, 'Иван Сидоров'],
        ];
    }
}