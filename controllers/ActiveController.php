<?php
namespace app\controllers;

class ActiveController extends \yii\rest\ActiveController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

}