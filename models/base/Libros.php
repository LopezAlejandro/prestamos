<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "libros".
 *
 * @property integer $libros_id
 * @property string $titulo
 * @property string $editorial
 * @property integer $ano
 * @property integer $edicion
 * @property integer $ejemplar
 * @property integer $nro_libro
 * @property integer $estado_id
 * @property integer $deposito_id
 * @property integer $tipo_libro_id
 *
 * @property \app\models\AutorHasLibros[] $autorHasLibros
 * @property \app\models\Autor[] $autorAutors
 * @property \app\models\TipoLibro $tipoLibro
 * @property \app\models\Deposito $deposito
 * @property \app\models\Estado $estado
 */
class Libros extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'ejemplar', 'nro_libro', 'estado_id', 'deposito_id', 'tipo_libro_id'], 'required'],
            [['ano', 'edicion', 'ejemplar', 'nro_libro', 'estado_id', 'deposito_id', 'tipo_libro_id'], 'integer'],
            [['titulo', 'editorial'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libros_id' => Yii::t('app', 'Libros ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Ano'),
            'edicion' => Yii::t('app', 'Edicion'),
            'ejemplar' => Yii::t('app', 'Ejemplar'),
            'nro_libro' => Yii::t('app', 'Nro Libro'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'deposito_id' => Yii::t('app', 'Deposito ID'),
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorHasLibros()
    {
        return $this->hasMany(\app\models\AutorHasLibros::className(), ['libros_libros_id' => 'libros_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorAutors()
    {
        return $this->hasMany(\app\models\Autor::className(), ['autor_id' => 'autor_autor_id'])->viaTable('autor_has_libros', ['libros_libros_id' => 'libros_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLibro()
    {
        return $this->hasOne(\app\models\TipoLibro::className(), ['tipo_libro_id' => 'tipo_libro_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeposito()
    {
        return $this->hasOne(\app\models\Deposito::className(), ['deposito_id' => 'deposito_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(\app\models\Estado::className(), ['estado_id' => 'estado_id']);
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
     * @return \app\models\LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\LibrosQuery(get_called_class());
    }
}
