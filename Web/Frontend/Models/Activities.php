<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string $name
 *
 * @property ActivitiesPackages[] $activitiesPackages
 * @property Packages[] $packages
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
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
        ];
    }

    /**
     * Gets query for [[ActivitiesPackages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivitiesPackages()
    {
        return $this->hasMany(ActivitiesPackages::className(), ['id_activity' => 'id']);
    }

    /**
     * Gets query for [[Packages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Packages::className(), ['id' => 'id_package'])->viaTable('activities_packages', ['id_activity' => 'id']);
    }
}
