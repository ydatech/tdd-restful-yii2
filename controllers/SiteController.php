<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;

use yii\web\UnauthorizedHttpException;

class SiteController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return ['message' => 'Welcome Home!'];

    }


    public function actionError()
    {
        $error = Yii::$app->errorHandler->exception;

        return $error;


    }

}
