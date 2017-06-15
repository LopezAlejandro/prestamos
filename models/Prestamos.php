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
            [['extension', 'fecha_devolucion', 'lectores_id', 'activo', 'nro_prestamo', 'libros_id'], 'required'],
            [['extension', 'lectores_id', 'activo', 'nro_prestamo', 'libros_id'], 'integer'],
            [['fecha_devolucion', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['nro_prestamo'], 'unique']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'prestamos_id' => Yii::t('app', 'Prestamos ID'),
            'extension' => Yii::t('app', 'Extension'),
            'fecha_devolucion' => Yii::t('app', 'Fecha Devolucion'),
            'lectores_id' => Yii::t('app', 'Lectores ID'),
            'activo' => Yii::t('app', 'Activo'),
            'nro_prestamo' => Yii::t('app', 'Nro Prestamo'),
            'libros_id' => Yii::t('app', 'Libros ID'),
        ];
    }
}
