<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[HiringType]].
 *
 * @see HiringType
 */
class HiringTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HiringType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HiringType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
