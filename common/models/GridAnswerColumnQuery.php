<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GridAnswerColumn]].
 *
 * @see GridAnswerColumn
 */
class GridAnswerColumnQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GridAnswerColumn[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GridAnswerColumn|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
