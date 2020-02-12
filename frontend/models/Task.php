<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string|null $status
 * @property string|null $description
 * @property int $category_id
 * @property int|null $budget
 * @property string $date_expire
 * @property string|null $date_create
 * @property string $lat
 * @property string $long
 * @property int|null $city_id
 * @property int|null $contractor_id
 * @property int $customer_id
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'date_expire', 'lat', 'long', 'customer_id'], 'required'],
            [['category_id', 'budget', 'city_id', 'contractor_id', 'customer_id'], 'integer'],
            [['date_expire', 'date_create'], 'safe'],
            [['title', 'status', 'lat', 'long'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'budget' => 'Budget',
            'date_expire' => 'Date Expire',
            'date_create' => 'Date Create',
            'lat' => 'Lat',
            'long' => 'Long',
            'city_id' => 'City ID',
            'contractor_id' => 'Contractor ID',
            'customer_id' => 'Customer ID',
        ];
    }
}
