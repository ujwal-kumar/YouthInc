<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OrgQuestionMapping]].
 *
 * @see OrgQuestionMapping
 */
class OrgQuestionMappingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrgQuestionMapping[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrgQuestionMapping|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
