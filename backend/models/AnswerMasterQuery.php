<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AnswerMaster]].
 *
 * @see AnswerMaster
 */
class AnswerMasterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AnswerMaster[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AnswerMaster|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
