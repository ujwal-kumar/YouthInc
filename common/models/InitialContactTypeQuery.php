<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InitialContactType]].
 *
 * @see InitialContactType
 */
class InitialContactTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InitialContactType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InitialContactType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
