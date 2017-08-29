<?php
class ConfigCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function tryToSeeHomePage(ApiTester $I)
    {
        $I->wantTo('see restful default page');
        $I->sendGet('/');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // response code 200
        $I->seeHttpHeader('Set-Cookie');
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['message' => 'Welcome Home!']);
    }

    // test error handler

    public function tryToSeeNotFoundError(ApiTester $I)
    {
        $I->wantTo('see notfound error response in json');
        $I->sendGet('/something-not-found');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::NOT_FOUND);// response 404
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['statusCode' => \Codeception\Util\HttpCode::NOT_FOUND]);
    }
}
