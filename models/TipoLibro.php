<?php

namespace app\models;

use Yii;
use \app\models\base\TipoLibro as BaseTipoLibro;

/**
 * This is the model class for table "tipo_libro".
 */
class TipoLibro extends BaseTipoLibro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['tipo_libro_id', 'descripcion'], 'required'],
            [['tipo_libro_id'], 'integer'],
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
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
