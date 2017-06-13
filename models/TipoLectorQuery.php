<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoLector]].
 *
 * @see TipoLector
 */
class TipoLectorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TipoLector[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipoLector|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}