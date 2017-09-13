<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyDetails]].
 *
 * @see SurveyDetails
 */
class SurveyDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SurveyDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SurveyDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
