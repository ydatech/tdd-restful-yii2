<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "todo".
 *
 * @property int $id
 * @property string $title
 * @property int $completed
 * @property int $created_at
 * @property int $updated_at
 */
class Todo extends \yii\db\ActiveRecord
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
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['completed'], 'integer'],
            [['completed'], 'default', 'value' => 0],
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
            'completed' => 'Completed',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
