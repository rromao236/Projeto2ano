<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "packages".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $rating
 * @property string $flightstart
 * @property string $flightend
 * @property string $flightbackstart
 * @property string $flightbackend
 * @property int $id_hotel
 * @property int $id_airportstart
 * @property int $id_airportend
 *
 * @property Activities[] $activities
 * @property ActivitiesPackages[] $activitiesPackages
 * @property Airports $airportend
 * @property Airports $airportstart
 * @property Hotels $hotel
 * @property PackageImages[] $packageImages
 * @property User[] $users
 * @property UsersPackages[] $usersPackages
 */
class Packages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price', 'rating', 'flightstart', 'flightend', 'flightbackstart', 'flightbackend', 'id_hotel', 'id_airportstart', 'id_airportend'], 'required'],
            [['price', 'rating', 'id_hotel', 'id_airportstart', 'id_airportend'], 'integer'],
            [['flightstart', 'flightend', 'flightbackstart', 'flightbackend'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['id_airportend'], 'exist', 'skipOnError' => true, 'targetClass' => Airports::className(), 'targetAttribute' => ['id_airportend' => 'id']],
            [['id_airportstart'], 'exist', 'skipOnError' => true, 'targetClass' => Airports::className(), 'targetAttribute' => ['id_airportstart' => 'id']],
            [['id_hotel'], 'exist', 'skipOnError' => true, 'targetClass' => Hotels::className(), 'targetAttribute' => ['id_hotel' => 'id']],
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
            'description' => 'Description',
            'price' => 'Price',
            'rating' => 'Rating',
            'flightstart' => 'Flightstart',
            'flightend' => 'Flightend',
            'flightbackstart' => 'Flightbackstart',
            'flightbackend' => 'Flightbackend',
            'id_hotel' => 'Id Hotel',
            'id_airportstart' => 'Id Airportstart',
            'id_airportend' => 'Id Airportend',
        ];
    }

    /**
     * Gets query for [[Activities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activities::className(), ['id' => 'id_activity'])->viaTable('activities_packages', ['id_package' => 'id']);
    }

    /**
     * Gets query for [[ActivitiesPackages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivitiesPackages()
    {
        return $this->hasMany(ActivitiesPackages::className(), ['id_package' => 'id']);
    }

    /**
     * Gets query for [[Airportend]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirportend()
    {
        return $this->hasOne(Airports::className(), ['id' => 'id_airportend']);
    }

    /**
     * Gets query for [[Airportstart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirportstart()
    {
        return $this->hasOne(Airports::className(), ['id' => 'id_airportstart']);
    }

    /**
     * Gets query for [[Hotel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotels::className(), ['id' => 'id_hotel']);
    }

    /**
     * Gets query for [[PackageImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackageImages()
    {
        return $this->hasMany(PackageImages::className(), ['package_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('users_packages', ['id_package' => 'id']);
    }

    /**
     * Gets query for [[UsersPackages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersPackages()
    {
        return $this->hasMany(UsersPackages::className(), ['id_package' => 'id']);
    }
}
