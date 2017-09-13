<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrganizationProgram]].
 *
 * @see OrganizationProgram
 */
class OrganizationProgramQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrganizationProgram[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrganizationProgram|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
