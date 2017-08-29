<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;;
/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    public function behaviors()
    {

        return [
            [
                'class' => TimestampBehavior::className()
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
