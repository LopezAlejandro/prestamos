<?php

namespace app\models;

use Yii;
use \app\models\base\Countries as BaseCountries;

/**
 * This is the model class for table "countries".
 */
class Countries extends BaseCountries
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ]);
    }
	
}
