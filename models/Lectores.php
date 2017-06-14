<?php

namespace app\models;

use Yii;
use \app\models\base\Lectores as BaseLectores;

/**
 * This is the model class for table "lectores".
 */
class Lectores extends BaseLectores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre', 'documento', 'tipo_lector_id', 'tipo_documento_id'], 'required'],
            [['tipo_lector_id', 'tipo_documento_id'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['nombre', 'documento'], 'string', 'max' => 45],
            [['direccion'], 'string', 'max' => 70],
            [['telefono'], 'string', 'max' => 15],
            [['mail'], 'string', 'max' => 50]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'lectores_id' => Yii::t('app', 'Lectores ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'documento' => Yii::t('app', 'Documento'),
            'tipo_lector_id' => Yii::t('app', 'Tipo Lector ID'),
            'tipo_documento_id' => Yii::t('app', 'Tipo Documento ID'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'mail' => Yii::t('app', 'Mail'),
        ];
    }
}
