<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "lectores".
 *
 * @property integer $lectores_id
 * @property string $nombre
 * @property string $documento
 * @property integer $tipo_lector_id
 * @property integer $tipo_documento_id
 * @property string $direccion
 * @property string $telefono
 * @property string $mail
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 * @property integer $estado
 *
 * @property \app\models\EstadoLector $estado0
 * @property \app\models\TipoDocumento $tipoDocumento
 * @property \app\models\TipoLector $tipoLector
 * @property \app\models\Prestamos[] $prestamos
 */
class Lectores extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'documento', 'tipo_lector_id', 'tipo_documento_id'], 'required'],
            [['tipo_lector_id', 'tipo_documento_id', 'estado'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre', 'documento', 'created_by', 'updated_by'], 'string', 'max' => 45],
            [['direccion'], 'string', 'max' => 70],
            [['telefono'], 'string', 'max' => 15],
            [['mail'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lectores';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lectores_id' => Yii::t('app', 'Lectores ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'documento' => Yii::t('app', 'Documento'),
            'tipo_lector_id' => Yii::t('app', 'Tipo Lector ID'),
            'tipo_documento_id' => Yii::t('app', 'Tipo Documento ID'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'mail' => Yii::t('app', 'Mail'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(\app\models\EstadoLector::className(), ['estado_id' => 'estado']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumento()
    {
        return $this->hasOne(\app\models\TipoDocumento::className(), ['tipo_documento_id' => 'tipo_documento_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLector()
    {
        return $this->hasOne(\app\models\TipoLector::className(), ['tipo_lector_id' => 'tipo_lector_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(\app\models\Prestamos::className(), ['lectores_id' => 'lectores_id']);
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
     * @return \app\models\LectoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\LectoresQuery(get_called_class());
    }
    
    
    
}
