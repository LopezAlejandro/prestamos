<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "tipo_documento".
 *
 * @property integer $tipo_documento_id
 * @property string $descripcion
 *
 * @property \app\models\Lectores[] $lectores
 */
class TipoDocumento extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
        return 'tipo_documento';
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
            'tipo_documento_id' => Yii::t('app', 'Tipo Documento ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasMany(\app\models\Lectores::className(), ['tipo_documento_id' => 'tipo_documento_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\TipoDocumentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TipoDocumentoQuery(get_called_class());
    }
}
