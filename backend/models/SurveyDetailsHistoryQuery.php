<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SurveyDetailsHistory]].
 *
 * @see SurveyDetailsHistory
 */
class SurveyDetailsHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SurveyDetailsHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SurveyDetailsHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
