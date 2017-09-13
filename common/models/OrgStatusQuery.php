<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrgStatus]].
 *
 * @see OrgStatus
 */
class OrgStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrgStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrgStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
