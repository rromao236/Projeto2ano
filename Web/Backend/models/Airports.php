<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "airports".
 *
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $city
 *
 * @property Packages[] $packages
 * @property Packages[] $packages0
 */
class Airports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'airports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'country', 'city'], 'required'],
            [['name'], 'string', 'max' => 40],
            [['country', 'city'], 'string', 'max' => 30],
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
            'country' => 'Country',
            'city' => 'City',
        ];
    }

    /**
     * Gets query for [[Packages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Packages::className(), ['id_airportend' => 'id']);
    }

    /**
     * Gets query for [[Packages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackages0()
    {
        return $this->hasMany(Packages::className(), ['id_airportstart' => 'id']);
    }
}
