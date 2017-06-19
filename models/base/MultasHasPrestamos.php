<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "multas_has_prestamos".
 *
 * @property integer $multas_multas_id
 * @property integer $prestamos_prestamos_id
 *
 * @property \app\models\Multas $multasMultas
 * @property \app\models\Prestamos $prestamosPrestamos
 */
class MultasHasPrestamos extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['multas_multas_id', 'prestamos_prestamos_id'], 'required'],
            [['multas_multas_id', 'prestamos_prestamos_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'multas_has_prestamos';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'multas_multas_id' => Yii::t('app', 'Multas Multas ID'),
            'prestamos_prestamos_id' => Yii::t('app', 'Prestamos Prestamos ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultasMultas()
    {
        return $this->hasOne(\app\models\Multas::className(), ['multas_id' => 'multas_multas_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosPrestamos()
    {
        return $this->hasOne(\app\models\Prestamos::className(), ['prestamos_id' => 'prestamos_prestamos_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\MultasHasPrestamosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MultasHasPrestamosQuery(get_called_class());
    }
}
