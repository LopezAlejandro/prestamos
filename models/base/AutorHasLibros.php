<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "autor_has_libros".
 *
 * @property integer $autor_autor_id
 * @property integer $libros_libros_id
 *
 * @property \app\models\Autor $autorAutor
 * @property \app\models\Libros $librosLibros
 */
class AutorHasLibros extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor_autor_id', 'libros_libros_id'], 'required'],
            [['autor_autor_id', 'libros_libros_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autor_has_libros';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'autor_autor_id' => Yii::t('app', 'Autor Autor ID'),
            'libros_libros_id' => Yii::t('app', 'Libros Libros ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorAutor()
    {
        return $this->hasOne(\app\models\Autor::className(), ['autor_id' => 'autor_autor_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosLibros()
    {
        return $this->hasOne(\app\models\Libros::className(), ['libros_id' => 'libros_libros_id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\AutorHasLibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AutorHasLibrosQuery(get_called_class());
    }
}
