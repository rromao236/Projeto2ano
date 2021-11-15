<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_info".
 *
 * @property int $userid
 * @property int|null $nif
 * @property string|null $name
 * @property string|null $adress
 * @property int|null $phone
 * @property string|null $birthdate
 * @property int|null $points
 *
 * @property User $user
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
            [['userid'], 'required'],
            [['userid', 'nif', 'phone', 'points'], 'integer'],
            [['birthdate'], 'safe'],
            [['name', 'adress'], 'string', 'max' => 30],
            [['userid'], 'unique'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'nif' => 'Nif',
            'name' => 'Name',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'birthdate' => 'Birthdate',
            'points' => 'Points',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}

