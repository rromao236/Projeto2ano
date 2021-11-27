<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package_images".
 *
 * @property int $id_image
 * @property string $name
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
            [['name', 'image', 'package_id'], 'required'],
            [['package_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
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
            'name' => 'Name',
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
