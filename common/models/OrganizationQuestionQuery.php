<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrganizationQuestion]].
 *
 * @see OrganizationQuestion
 */
class OrganizationQuestionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrganizationQuestion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrganizationQuestion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
