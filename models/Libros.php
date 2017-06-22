<?php

namespace app\models;

use Yii;
use \app\models\base\Libros as BaseLibros;

/**
 * This is the model class for table "libros".
 */
class Libros extends BaseLibros
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['titulo', 'ejemplar', 'nro_libro', 'estado_id', 'deposito_id', 'tipo_libro_id'], 'required'],
            [['ano', 'edicion', 'ejemplar', 'nro_libro', 'estado_id', 'deposito_id', 'tipo_libro_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['titulo', 'editorial', 'created_by', 'updated_by'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'libros_id' => Yii::t('app', 'Libros ID'),
            'titulo' => Yii::t('app', 'Título'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Año'),
            'edicion' => Yii::t('app', 'Edición'),
            'ejemplar' => Yii::t('app', 'Ejemplar'),
            'nro_libro' => Yii::t('app', 'Nro de Libro'),
            'estado_id' => Yii::t('app', 'Estado'),
            'deposito_id' => Yii::t('app', 'Depósito'),
            'tipo_libro_id' => Yii::t('app', 'Tipo de Libro'),
        ];
    }
}
