<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PrestamosHasLibros]].
 *
 * @see PrestamosHasLibros
 */
class PrestamosHasLibrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PrestamosHasLibros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PrestamosHasLibros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}