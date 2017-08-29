<?php
use app\tests\unit\fixtures\TodoFixture;

class TodoCest
{
    protected $todo;

    public function _fixtures()
    {

        return [
            'todo' => [
                'class' => TodoFixture::className()
            ]
        ];
    }

    public function _before(ApiTester $I)
    {
        $this->todo = $I->grabFixture('todo', 'todo0');
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function tryToGetTodos(ApiTester $I)
    {
        $I->wantTo('get todos');
        $I->sendGet('/todos');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.items[*].title');
        $I->seeResponseJsonMatchesJsonPath('$._links');
        $I->seeResponseJsonMatchesJsonPath('$._meta');

    }

    public function tryToCreateTodo(ApiTester $I)
    {
        $newTodo = [
            'title' => 'Something Todo'
        ];
        $I->wantTo('create a todo');
        $I->sendPOST('/todos', $newTodo);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($newTodo);
        $I->seeResponseJsonMatchesJsonPath('$.id');
        $I->seeResponseJsonMatchesJsonPath('$.title');
        $I->seeResponseJsonMatchesJsonPath('$.completed');
        $I->seeResponseJsonMatchesJsonPath('$.created_at');
        $I->seeResponseJsonMatchesJsonPath('$.updated_at');
    }

    public function tryToCreateTodoWithInvalidInput(ApiTester $I)
    {
        $newTodo = [];
        $I->wantTo('create todo with invalid input/data');
        $I->sendPOST('/todos', $newTodo);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNPROCESSABLE_ENTITY);
        $I->seeResponseContainsJson(['field' => 'title']);
    }

    public function tryToUpdateTodo(ApiTester $I)
    {

        $updatedTodoData = [
            'title' => 'Update Todo To Something Else',
            'completed' => 1
        ];
        $I->wantTo('update a todo');
        $I->sendPATCH("/todos/{$this->todo->id}", $updatedTodoData);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

        $I->seeResponseIsJson();
        $I->seeResponseContasJson($updatedTodoData);

    }

    public function tryToUpdateNonExistTodo(ApiTester $I)
    {
        $I->wantTo('update non exist todo');
        $I->sendPATCH('/todos/20898989');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::NOT_FOUND);
        $I->seeResponseIsJson();
    }

    public function tryToDeleteTodo(ApiTester $I)
    {
        $I->wantTo('delete a todo');
        $I->sendDELETE("/todos/{$this->todo->id}");
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::NO_CONTENT);

    }
}
