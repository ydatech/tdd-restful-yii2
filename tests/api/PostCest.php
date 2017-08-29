<?php
use app\tests\unit\fixtures\PostFixture;

class PostCest
{
    public function _fixtures()
    {
        return [
            'post' => [
                'class' => PostFixture::className()
            ]
        ];

    }
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function tryToListPosts(ApiTester $I)
    {
        $I->wantTo('list posts');
        $I->sendGET('/posts');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.items[*].title');
        $I->seeResponseJsonMatchesJsonPath('$.items[*].body');
        $I->seeResponseJsonMatchesJsonPath('$.items[*].created_at');
        $I->seeResponseJsonMatchesJsonPath('$.items[*].updated_at');

    }

    public function tryToCreateNewPost(ApiTester $I)
    {
        $newData = [
            'title' => 'This is title',
            'body' => 'This is body'
        ];
        $I->wantTo('create new post');
        $I->sendPOST('/posts', $newData);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);
        $I->seeResponseContainsJson($newData);
        $I->seeResponseJsonMatchesJsonPath('$.id');
        $I->seeResponseJsonMatchesJsonPath('$.created_at');
        $I->seeResponseJsonMatchesJsonPath('$.updated_at');
    }


}
