<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "tipo_lector".
 *
 * @property integer $tipo_lector_id
 * @property string $descripcion
 * @property integer $prestamo
 *
 * @property \app\models\Lectores[] $lectores
 */
class TipoLector extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'prestamo'], 'required'],
            [['prestamo'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_lector';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_lector_id' => Yii::t('app', 'Tipo Lector ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'prestamo' => Yii::t('app', 'Prestamo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasMany(\app\models\Lectores::className(), ['tipo_lector_id' => 'tipo_lector_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\TipoLectorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TipoLectorQuery(get_called_class());
    }
}
