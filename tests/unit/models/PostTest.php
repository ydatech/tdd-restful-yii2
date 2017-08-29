<?php
namespace models;

use app\models\Post;
use app\tests\unit\fixtures\PostFixture;

class PostTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'post' => [
                'class' => PostFixture::className()
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
    public function testFindAllPost()
    {
        \expect_that(Post::find()->all());

    }

    public function testCreateNewPost()
    {

        $post = new Post();
        $post->title = 'this is title';
        $post->body = 'this is body';
        $this->tester->assertEquals(true, $post->save());
        $this->tester->assertNotNull($post->created_at);
        $this->tester->assertNotNull($post->updated_at);
        $this->tester->assertNotNull($post->id);

    }
}