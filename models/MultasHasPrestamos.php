<?php

namespace app\models;

use Yii;
use \app\models\base\MultasHasPrestamos as BaseMultasHasPrestamos;

/**
 * This is the model class for table "multas_has_prestamos".
 */
class MultasHasPrestamos extends BaseMultasHasPrestamos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['multas_multas_id', 'prestamos_prestamos_id'], 'required'],
            [['multas_multas_id', 'prestamos_prestamos_id'], 'integer']
        ]);
    }
	
}
