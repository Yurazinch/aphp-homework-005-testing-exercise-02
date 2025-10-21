<?php 

declare(strict_types=1);

namespace Yuraz\Exercise02\Tests\UserTest;

use PHPUnit\Framework\TestCase;
use Src\Exercise02\User;

//require 'vendor\autoload.php';
//require_once ('User.php');

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void 
    {
        $this->user = new User;
    }
    
    /**
     * @dataProvider providerInsert
     */
    public function testInsert(array $values, array|string $expended)
    {
        $this->user->insert($values);
        $userResult = $this->user->get();
        $this->assertEquals($expended, $userResult);
    }

    public function providerInsert()
    {
        return [
            [[], 'Нет строки для добавления'],
            [['name' => 'Иван', 'surname' => 'Иванов'], [['name' => 'Иван', 'surname' => 'Иванов']]],
            [['name' => 'Сергей', 'surname' => 'Сергеев'], [['name' => 'Иван', 'surname' => 'Иванов'], ['name' => 'Сергей', 'surname' => 'Сергеев']]],
            ['name , surname', 'Нет строки для добавления'],
        ];
    }

    /**
     * @dataProvider providerUpdate
     */
    public function testUpdate(int $id, array $values, array|string $expended)
    {
        $userResult = $this->user->update($id, $values);
        $this->assertEquals($expended, $userResult);
    }

    public function providerUpdate()
    {
        return [
            [10, ['name' => 'Упдат', 'surname' => 'Упдатов'], 'Строки не существует'],
            [1, ['name' => 'Упдат', 'surname' => 'Упдатов'], ['name' => 'Упдат', 'surname' => 'Упдатов']],
        ];
    }

    /**
     * @dataProvider providerDelete
     */
    public function testDelete(int $id, array|string $expended)
    {
        $this->user->delete($id);
        $userResult = $this->user->get();
        $this->assertEquals($expended, $userResult);
    }

    public function providerDelete()
    {
        return [
            [9, 'Строки не существует'],
            [0, ['name' => 'Упдат', 'surname' => 'Упдатов']],
        ];
    }
}