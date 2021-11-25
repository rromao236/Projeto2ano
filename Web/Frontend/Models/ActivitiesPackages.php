<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities_packages".
 *
 * @property int $id_activity
 * @property int $id_package
 * @property string $responsible
 * @property string $timestart
 * @property int $duration
 *
 * @property Activities $activity
 * @property Packages $package
 */
class ActivitiesPackages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities_packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_activity', 'id_package', 'responsible', 'timestart', 'duration'], 'required'],
            [['id_activity', 'id_package', 'duration'], 'integer'],
            [['timestart'], 'safe'],
            [['responsible'], 'string', 'max' => 20],
            [['id_activity', 'id_package'], 'unique', 'targetAttribute' => ['id_activity', 'id_package']],
            [['id_activity'], 'exist', 'skipOnError' => true, 'targetClass' => Activities::className(), 'targetAttribute' => ['id_activity' => 'id']],
            [['id_package'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::className(), 'targetAttribute' => ['id_package' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_activity' => 'Id Activity',
            'id_package' => 'Id Package',
            'responsible' => 'Responsible',
            'timestart' => 'Timestart',
            'duration' => 'Duration',
        ];
    }

    /**
     * Gets query for [[Activity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::className(), ['id' => 'id_activity']);
    }

    /**
     * Gets query for [[Package]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Packages::className(), ['id' => 'id_package']);
    }
}
