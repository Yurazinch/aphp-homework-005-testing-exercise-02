<?php 

declare(strict_types=1);

//namespace Yuraz\Exercise02\UserTest;
//use Yuraz\Exercise02\User;
use PHPUnit\Framework\TestCase;

require_once ('src/User.php');

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void 
    {
        $this->user = new User;
    }
    
    /**
     * @param $values
     * @param $expected
     * 
     * @dataProvider providerInsert
     */
    public function testInsert(array $values, array|string $expected)
    {
        $this->user->insert($values);
        $userResult = $this->user->get();
        $this->assertEquals($expected, $userResult);
    }
    public function providerInsert()
    {
        return [
            'test1' => [[], 'Нет строки для добавления'],
            'test2' => [['name' => 'Иван', 'surname' => 'Иванов'], [['name' => 'Иван', 'surname' => 'Иванов']]],
            'test3' => [['name' => 'Сергей', 'surname' => 'Сергеев'], [['name' => 'Иван', 'surname' => 'Иванов'], ['name' => 'Сергей', 'surname' => 'Сергеев']]],
            'test4' => ['name , surname', 'Нет строки для добавления'],
        ];
    }

    /**
     * @param $id
     * @param $values
     * @param $expected
     * 
     * @dataProvider providerUpdate
     */
    public function testUpdate(int $id, array $values, array|string $expected)
    {
        $userResult = $this->user->update($id, $values);
        $this->assertEquals($expected, $userResult);
    }
    public function providerUpdate()
    {
        return [
            'test5' => [10, ['name' => 'Упдат', 'surname' => 'Упдатов'], 'Строки не существует'],
            'test6' => [1, ['name' => 'Упдат', 'surname' => 'Упдатов'], ['name' => 'Упдат', 'surname' => 'Упдатов']],
        ];
    }

    /**
     * @param $id
     * @psrsm $expected
     * 
     * @dataProvider providerDelete
     */
    public function testDelete(int $id, array|string $expected)
    {
        $this->user->delete($id);
        $userResult = $this->user->get();
        $this->assertEquals($expected, $userResult);
    }
    public function providerDelete()
    {
        return [
            'test7' => [9, 'Строки не существует'],
            'test8' => [0, ['name' => 'Упдат', 'surname' => 'Упдатов']],
        ];
    }
}