<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ControlType]].
 *
 * @see ControlType
 */
class ControlTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ControlType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ControlType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
