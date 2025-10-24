<?php 

declare(strict_types=1);

namespace Yuraz\Exercise02\UserTest;

use Yuraz\Exercise02\User;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void 
    {
        $this->user = new User;
    }

    protected function tearDown(): void
    {
        
    }
    
    #[DataProvider('providerInsert')]
    public function testInsert(array $values, array|string $expected)
    {
        $this->expectException(\Exception::class);
        $this->user->insert($values);
        $userResult = $this->user->get();
        $this->assertEquals($expected, $userResult);
    }
    public static function providerInsert()
    {
        return [
            'test1' => [[], 'Нет данных для добавления'],
            'test2' => [['name' => 'Иван', 'surname' => 'Иванов'], [['name' => 'Иван', 'surname' => 'Иванов']]],
            'test3' => [['name' => 'Сергей', 'surname' => 'Сергеев'], [['name' => 'Иван', 'surname' => 'Иванов'], ['name' => 'Сергей', 'surname' => 'Сергеев']]],            
        ];
    }

    #[DataProvider('providerUpdate')]
    public function testUpdate(int $id, array $values, array|string $expected)
    {
        $this->expectException(\Exception::class);
        $userResult = $this->user->update($id, $values);
        $this->assertEquals($expected, $userResult);
    }
    public static function providerUpdate()
    {
        return [
            'test5' => [10, ['name' => 'Упдат', 'surname' => 'Упдатов'], 'Строки не существует'],
            'test6' => [1, ['name' => 'Упдат', 'surname' => 'Упдатов'], ['name' => 'Упдат', 'surname' => 'Упдатов']],
        ];
    }
    
    #[DataProvider('providerDelete')]
    public function testDelete(int $id, array|string $expected)
    {
        $this->expectException(\Exception::class);
        $this->user->delete($id);
        $userResult = $this->user->get();
        $this->assertEquals($expected, $userResult);
    }
    public static function providerDelete()
    {
        return [
            'test7' => [9, 'Строки не существует'],
            'test8' => [0, ['name' => 'Упдат', 'surname' => 'Упдатов']],
        ];
    }
}