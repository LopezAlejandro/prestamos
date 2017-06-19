<?php

namespace app\models;

use Yii;
use \app\models\base\Multas as BaseMultas;

/**
 * This is the model class for table "multas".
 */
class Multas extends BaseMultas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['fin_multa', 'activa'], 'required'],
            [['fin_multa'], 'safe'],
            [['activa'], 'integer']
        ]);
    }
	
}
