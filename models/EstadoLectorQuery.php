<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EstadoLector]].
 *
 * @see EstadoLector
 */
class EstadoLectorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EstadoLector[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EstadoLector|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}