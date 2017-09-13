<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Sysdiagrams]].
 *
 * @see Sysdiagrams
 */
class SysdiagramsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sysdiagrams[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sysdiagrams|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
