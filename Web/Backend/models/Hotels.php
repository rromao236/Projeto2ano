<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property string $city
 * @property string $country
 * @property string $description
 * @property int $nightprice
 * @property int $rating
 *
 * @property Packages[] $packages
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'city', 'country', 'description', 'nightprice', 'rating'], 'required'],
            [['nightprice', 'rating'], 'integer'],
            [['name', 'adress'], 'string', 'max' => 30],
            [['city'], 'string', 'max' => 20],
            [['country'], 'string', 'max' => 15],
            [['description'], 'string', 'max' => 500],
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
            'adress' => 'Adress',
            'city' => 'City',
            'country' => 'Country',
            'description' => 'Description',
            'nightprice' => 'Nightprice',
            'rating' => 'Rating',
        ];
    }

    /**
     * Gets query for [[Packages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Packages::className(), ['id_hostel' => 'id']);
    }
}
