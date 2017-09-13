<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Ftat]].
 *
 * @see Ftat
 */
class FtatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Ftat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ftat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
