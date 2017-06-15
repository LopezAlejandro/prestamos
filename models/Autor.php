<?php

namespace app\models;

use Yii;
use \app\models\base\Autor as BaseAutor;

/**
 * This is the model class for table "autor".
 */
class Autor extends BaseAutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre'], 'required'],
            [['nacimiento'], 'safe'],
            [['nombre', 'nacionalidad'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'autor_id' => Yii::t('app', 'Autor ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
            'nacimiento' => Yii::t('app', 'Nacimiento'),
        ];
    }
}
