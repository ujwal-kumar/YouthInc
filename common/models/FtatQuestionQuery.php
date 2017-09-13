<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[FtatQuestion]].
 *
 * @see FtatQuestion
 */
class FtatQuestionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FtatQuestion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FtatQuestion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
