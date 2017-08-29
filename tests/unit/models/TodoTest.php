<?php
namespace tests\models;

use app\models\Todo;

use app\tests\unit\fixtures\TodoFixture;

class TodoTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'todo' => [
                'class' => TodoFixture::className()
            ]
        ];
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFindAllTodos()
    {
        \expect_that(Todo::find()->all());

    }

    public function testCreateNewTodo()
    {

        $todo = new Todo();
        $todo->title = 'Something Todo';
        $this->tester->assertEquals(true, $todo->save());
        $this->tester->assertNotNull($todo->completed);
        $this->tester->assertNotNull($todo->created_at);
        $this->tester->assertNotNull($todo->updated_at);
        //\expect_that($todo->save());
        //\expect_that($todo->completed);
       // \expect_that($todo->created_at);
        //\expect_that($todo->update_at);




    }

    public function testCreateNewTodoWithInvalidData()
    {
        $todo = new Todo();
        $this->tester->assertEquals(false, $todo->save());
        \expect_that($todo->getErrors());

    }
}