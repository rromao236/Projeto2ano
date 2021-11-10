<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_info".
 *
 * @property int $nif
 * @property int $userid
 * @property string $name
 * @property string $adress
 * @property int $phone
 * @property string $email
 * @property string $birthdate
 * @property int|null $points
 */
class UsersInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nif', 'userid', 'name', 'adress', 'phone', 'email', 'birthdate'], 'required'],
            [['nif', 'userid', 'phone', 'points'], 'integer'],
            [['birthdate'], 'safe'],
            [['name', 'adress', 'email'], 'string', 'max' => 30],
            [['nif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nif' => 'Nif',
            'userid' => 'Userid',
            'name' => 'Name',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'email' => 'Email',
            'birthdate' => 'Birthdate',
            'points' => 'Points',
        ];
    }
}
