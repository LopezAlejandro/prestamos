<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "autor".
 *
 * @property integer $autor_id
 * @property string $nombre
 * @property string $nacionalidad
 * @property string $nacimiento
 *
 * @property \app\models\AutorHasLibros[] $autorHasLibros
 * @property \app\models\Libros[] $librosLibros
 */
class Autor extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nacimiento'], 'safe'],
            [['nombre', 'nacionalidad'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'autor_id' => Yii::t('app', 'Autor ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
            'nacimiento' => Yii::t('app', 'Nacimiento'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorHasLibros()
    {
        return $this->hasMany(\app\models\AutorHasLibros::className(), ['autor_autor_id' => 'autor_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosLibros()
    {
        return $this->hasMany(\app\models\Libros::className(), ['libros_id' => 'libros_libros_id'])->viaTable('autor_has_libros', ['autor_autor_id' => 'autor_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\AutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AutorQuery(get_called_class());
    }
}
