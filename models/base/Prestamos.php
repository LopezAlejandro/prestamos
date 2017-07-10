<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "prestamos".
 *
 * @property integer $prestamos_id
 * @property integer $extension
 * @property string $fecha_devolucion
 * @property integer $lectores_id
 * @property integer $activo
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 *
 * @property \app\models\MultasHasPrestamos[] $multasHasPrestamos
 * @property \app\models\Multas[] $multasMultas
 * @property \app\models\Lectores $lectores
 * @property \app\models\PrestamosHasLibros[] $prestamosHasLibros
 * @property \app\models\Libros[] $librosLibros
 */
class Prestamos extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['extension', 'fecha_devolucion', 'lectores_id', 'activo'], 'required'],
            [['extension', 'lectores_id', 'activo'], 'integer'],
            [['fecha_devolucion', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamos';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prestamos_id' => Yii::t('app', 'Nro de Préstamo'),
            'extension' => Yii::t('app', 'Extension'),
            'fecha_devolucion' => Yii::t('app', 'Fecha Devolución'),
            'lectores_id' => Yii::t('app', 'Nro de Lector'),
            'activo' => Yii::t('app', 'Activo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultasHasPrestamos()
    {
        return $this->hasMany(\app\models\MultasHasPrestamos::className(), ['prestamos_prestamos_id' => 'prestamos_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultasMultas()
    {
        return $this->hasMany(\app\models\Multas::className(), ['multas_id' => 'multas_multas_id'])->viaTable('multas_has_prestamos', ['prestamos_prestamos_id' => 'prestamos_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasOne(\app\models\Lectores::className(), ['lectores_id' => 'lectores_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosHasLibros()
    {
        return $this->hasMany(\app\models\PrestamosHasLibros::className(), ['prestamos_prestamos_id' => 'prestamos_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosLibros()
    {
        return $this->hasMany(\app\models\Libros::className(), ['libros_id' => 'libros_libros_id'])->viaTable('prestamos_has_libros', ['prestamos_prestamos_id' => 'prestamos_id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\PrestamosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PrestamosQuery(get_called_class());
    }
}
