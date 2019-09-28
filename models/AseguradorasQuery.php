<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Aseguradoras]].
 *
 * @see Aseguradoras
 */
class AseguradorasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Aseguradoras[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Aseguradoras|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
