<?php

namespace app\models;

use Yii;
use \app\models\base\Prestamos as BasePrestamos;

/**
 * This is the model class for table "prestamos".
 */
class Prestamos extends BasePrestamos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['extension', 'fecha_devolucion', 'lectores_id', 'activo'], 'required'],
            [['extension', 'lectores_id', 'activo'], 'integer'],
            [['fecha_devolucion', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'prestamos_id' => Yii::t('app', 'Nro de Préstamo'),
            'extension' => Yii::t('app', 'Extension'),
            'fecha_devolucion' => Yii::t('app', 'Fecha Devolución'),
            'lectores_id' => Yii::t('app', 'Nro de Lector'),
            'activo' => Yii::t('app', 'Activo'),
        ];
    }
}
