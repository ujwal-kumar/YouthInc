<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyStatus]].
 *
 * @see SurveyStatus
 */
class SurveyStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SurveyStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SurveyStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
