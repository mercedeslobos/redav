<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Consultas]].
 *
 * @see Consultas
 */
class ExposicionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Consultas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Consultas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
