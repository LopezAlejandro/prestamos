<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "multas".
 *
 * @property integer $multas_id
 * @property string $fin_multa
 * @property integer $activa
 *
 * @property \app\models\MultasHasPrestamos[] $multasHasPrestamos
 * @property \app\models\Prestamos[] $prestamosPrestamos
 */
class Multas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fin_multa', 'activa'], 'required'],
            [['fin_multa'], 'safe'],
            [['activa'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'multas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'multas_id' => Yii::t('app', 'Multas ID'),
            'fin_multa' => Yii::t('app', 'Fin Multa'),
            'activa' => Yii::t('app', 'Activa'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultasHasPrestamos()
    {
        return $this->hasMany(\app\models\MultasHasPrestamos::className(), ['multas_multas_id' => 'multas_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosPrestamos()
    {
        return $this->hasMany(\app\models\Prestamos::className(), ['prestamos_id' => 'prestamos_prestamos_id'])->viaTable('multas_has_prestamos', ['multas_multas_id' => 'multas_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\MultasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MultasQuery(get_called_class());
    }
}
