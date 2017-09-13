<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PartnerType]].
 *
 * @see PartnerType
 */
class PartnerTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PartnerType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PartnerType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
