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
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['titulo', 'editorial'], 'string', 'max' => 45],
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
            'libros_id' => Yii::t('app', 'Libros ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Ano'),
            'edicion' => Yii::t('app', 'Edicion'),
            'ejemplar' => Yii::t('app', 'Ejemplar'),
            'nro_libro' => Yii::t('app', 'Nro Libro'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'deposito_id' => Yii::t('app', 'Deposito ID'),
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
        ];
    }
}
