<?php

namespace app\models;

use Yii;
use \app\models\base\TipoDocumento as BaseTipoDocumento;

/**
 * This is the model class for table "tipo_documento".
 */
class TipoDocumento extends BaseTipoDocumento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
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
            'tipo_documento_id' => Yii::t('app', 'Tipo Documento ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
