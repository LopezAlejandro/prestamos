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
            [['tipo_lector_id', 'tipo_documento_id', 'estado'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre', 'documento', 'created_by', 'updated_by'], 'string', 'max' => 45],
            [['direccion'], 'string', 'max' => 70],
            [['telefono'], 'string', 'max' => 15],
            [['mail'], 'string', 'max' => 50]
        ]);
    }
	
}
