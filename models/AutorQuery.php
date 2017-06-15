<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Autor]].
 *
 * @see Autor
 */
class AutorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Autor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Autor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}