<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string|null $avatar
 * @property string|null $description
 * @property string $email
 * @property string $password
 * @property string $date_birth
 * @property int $city_id
 * @property int|null $rating
 * @property string|null $date_active
 * @property string|null $date_register
 * @property string|null $tel
 * @property string|null $skype
 * @property string|null $contacts
 * @property int $show_contacts
 * @property int $show_profile
 * @property int $is_customer
 * @property int|null $profile_views
 * @property int|null $failed_tasks_count
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'date_birth', 'city_id'], 'required'],
            [['date_birth', 'date_active', 'date_register'], 'safe'],
            [['city_id', 'rating', 'show_contacts', 'show_profile', 'is_customer', 'profile_views', 'failed_tasks_count'], 'integer'],
            [['name', 'avatar', 'email', 'password', 'tel', 'skype', 'contacts'], 'string', 'max' => 64],
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
            'name' => 'Name',
            'avatar' => 'Avatar',
            'description' => 'Description',
            'email' => 'Email',
            'password' => 'Password',
            'date_birth' => 'Date Birth',
            'city_id' => 'City ID',
            'rating' => 'Rating',
            'date_active' => 'Date Active',
            'date_register' => 'Date Register',
            'tel' => 'Tel',
            'skype' => 'Skype',
            'contacts' => 'Contacts',
            'show_contacts' => 'Show Contacts',
            'show_profile' => 'Show Profile',
            'is_customer' => 'Is Customer',
            'profile_views' => 'Profile Views',
            'failed_tasks_count' => 'Failed Tasks Count',
        ];
    }
}
