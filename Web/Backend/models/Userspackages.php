<?php

namespace app\models;

use app\models\Packages;
use app\models\User;
use Yii;

/**
 * This is the model class for table "users_packages".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_package
 * @property string $purchasedate
 * @property int $referencia
 * @property float $price
 * @property int $entity
 * @property string $estado
 * @property int $usedpoints
 * @property int $nrpeople
 *
 * @property Packages $package
 * @property User $user
 */
class Userspackages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_package', 'referencia', 'entity', 'usedpoints', 'nrpeople'], 'integer'],
            [['purchasedate', 'referencia', 'price', 'entity', 'estado', 'usedpoints', 'nrpeople'], 'required'],
            [['purchasedate'], 'safe'],
            [['price'], 'number'],
            [['estado'], 'string', 'max' => 15],
            [['id_package'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::className(), 'targetAttribute' => ['id_package' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_package' => 'Id Package',
            'purchasedate' => 'Purchasedate',
            'referencia' => 'Referencia',
            'price' => 'Price',
            'entity' => 'Entity',
            'estado' => 'Estado',
            'usedpoints' => 'Usedpoints',
            'nrpeople' => 'Nrpeople',
        ];
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
