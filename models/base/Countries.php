<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "countries".
 *
 * @property integer $id
 * @property string $name
 */
class Countries extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\CountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CountriesQuery(get_called_class());
    }
}
