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
            [['extension', 'fecha_devolucion', 'lectores_id', 'libros_id', 'activo'], 'required'],
            [['extension', 'lectores_id', 'libros_id', 'activo'], 'integer'],
            [['fecha_devolucion'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
