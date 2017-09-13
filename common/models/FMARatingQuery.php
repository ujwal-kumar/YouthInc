<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[FMARating]].
 *
 * @see FMARating
 */
class FMARatingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FMARating[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FMARating|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
