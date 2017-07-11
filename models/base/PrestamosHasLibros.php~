<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "prestamos_has_libros".
 *
 * @property integer $prestamos_prestamos_id
 * @property integer $libros_libros_id
 *
 * @property \app\models\Libros $librosLibros
 * @property \app\models\Prestamos $prestamosPrestamos
 */
class PrestamosHasLibros extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prestamos_prestamos_id', 'libros_libros_id'], 'required'],
            [['prestamos_prestamos_id', 'libros_libros_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamos_has_libros';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prestamos_prestamos_id' => Yii::t('app', 'Prestamos Prestamos ID'),
            'libros_libros_id' => Yii::t('app', 'Libros Libros ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosLibros()
    {
        return $this->hasOne(\app\models\Libros::className(), ['libros_id' => 'libros_libros_id']);
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
     * @return \app\models\PrestamosHasLibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PrestamosHasLibrosQuery(get_called_class());
    }
}
