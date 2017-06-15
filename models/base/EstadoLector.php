<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "estado_lector".
 *
 * @property integer $estado_id
 * @property string $descripcion
 *
 * @property \app\models\Lectores[] $lectores
 */
class EstadoLector extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_lector';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_id' => Yii::t('app', 'Estado ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasMany(\app\models\Lectores::className(), ['estado' => 'estado_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\EstadoLectorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EstadoLectorQuery(get_called_class());
    }
}
