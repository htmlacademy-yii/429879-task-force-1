<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "responses".
 *
 * @property int $id
 * @property int $task_id
 * @property int $contractor_id
 * @property string|null $date_create
 * @property int $price
 * @property string $comment
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'contractor_id', 'price', 'comment'], 'required'],
            [['task_id', 'contractor_id', 'price'], 'integer'],
            [['date_create'], 'safe'],
            [['comment'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'contractor_id' => 'Contractor ID',
            'date_create' => 'Date Create',
            'price' => 'Price',
            'comment' => 'Comment',
        ];
    }
}
