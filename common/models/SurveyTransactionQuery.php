<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyTransaction]].
 *
 * @see SurveyTransaction
 */
class SurveyTransactionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SurveyTransaction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SurveyTransaction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
