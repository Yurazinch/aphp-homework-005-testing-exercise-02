<?php

declare(strict_types=1);

namespace Yuraz\Exercise02\UserUpdateTest;

use Yuraz\Exercise02\User;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class UserUpdateTest extends TestCase
{
    private User $user;

    protected function setUp(): void 
    {
        $this->user = new User;
    }

    #[DataProvider('providerUpdate')]
    public function testUpdate(int $id, array $values, string $expected)
    {
        $this->user->insert(['name' => 'Иван', 'surname' => 'Иванов']);
        $this->user->insert(['name' => 'Петр', 'surname' => 'Петров']);
        $this->user->insert(['name' => 'Сидор', 'surname' => 'Сидоров']);   
        
        //$this->expectExceptionMessage('Строки не существует');
        $userResult = $this->user->update($id, $values);
        $result = "{$userResult['name']} {$userResult['surname']}";
        $this->assertEquals($expected, $result);
    }
    public static function providerUpdate()
    {
        return [
            //'test1' => [10, ['name' => 'Упдат', 'surname' => 'Упдатов'], 'Строки не существует'],
            'test2' => [1, ['name' => 'Упдат', 'surname' => 'Упдатов'], 'Упдат Упдатов'],
        ];
    }
}