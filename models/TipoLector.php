<?php

namespace app\models;

use Yii;
use \app\models\base\TipoLector as BaseTipoLector;

/**
 * This is the model class for table "tipo_lector".
 */
class TipoLector extends BaseTipoLector
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['descripcion', 'prestamo'], 'required'],
            [['prestamo'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'tipo_lector_id' => Yii::t('app', 'Tipo Lector ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'prestamo' => Yii::t('app', 'Prestamo'),
        ];
    }
}
