<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProgramCategory]].
 *
 * @see ProgramCategory
 */
class ProgramPartnerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProgramCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProgramCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
