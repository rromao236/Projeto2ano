<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package_images".
 *
 * @property int $id_image
 * @property string $image
 * @property int $package_id
 *
 * @property Packages $package
 */
class Packageimages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'package_id'], 'required'],
            [['image'], 'string'],
            [['image'],'file','extensions'=>'jpg,png,gif,jpeg'],
            [['package_id'], 'integer'],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::className(), 'targetAttribute' => ['package_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_image' => 'Id Image',
            'image' => 'Image',
            'package_id' => 'Package ID',
        ];
    }

    /**
     * Gets query for [[Package]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Packages::className(), ['id' => 'package_id']);
    }
}
