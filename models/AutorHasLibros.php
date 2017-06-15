<?php

namespace app\models;

use Yii;
use \app\models\base\AutorHasLibros as BaseAutorHasLibros;

/**
 * This is the model class for table "autor_has_libros".
 */
class AutorHasLibros extends BaseAutorHasLibros
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['autor_autor_id', 'libros_libros_id'], 'required'],
            [['autor_autor_id', 'libros_libros_id'], 'integer']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'autor_autor_id' => Yii::t('app', 'Autor Autor ID'),
            'libros_libros_id' => Yii::t('app', 'Libros Libros ID'),
        ];
    }
}
