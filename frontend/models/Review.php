<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $task_id
 * @property string|null $comment
 * @property int $mark
 * @property int $contractor_id
 * @property int $customer_id
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'mark', 'contractor_id', 'customer_id'], 'required'],
            [['task_id', 'mark', 'contractor_id', 'customer_id'], 'integer'],
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
            'comment' => 'Comment',
            'mark' => 'Mark',
            'contractor_id' => 'Contractor ID',
            'customer_id' => 'Customer ID',
        ];
    }
}
