<?php

namespace app\models;

use Yii;
use \app\models\base\PrestamosHasLibros as BasePrestamosHasLibros;

/**
 * This is the model class for table "prestamos_has_libros".
 */
class PrestamosHasLibros extends BasePrestamosHasLibros
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['prestamos_prestamos_id', 'libros_libros_id'], 'required'],
            [['prestamos_prestamos_id', 'libros_libros_id'], 'integer']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'prestamos_prestamos_id' => Yii::t('app', 'Prestamos Prestamos ID'),
            'libros_libros_id' => Yii::t('app', 'Libros Libros ID'),
        ];
    }
}
