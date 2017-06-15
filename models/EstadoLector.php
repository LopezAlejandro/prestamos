<?php

namespace app\models;

use Yii;
use \app\models\base\EstadoLector as BaseEstadoLector;

/**
 * This is the model class for table "estado_lector".
 */
class EstadoLector extends BaseEstadoLector
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['descripcion'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'estado_id' => Yii::t('app', 'Estado ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
