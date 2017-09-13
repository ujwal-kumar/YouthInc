<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MenuList]].
 *
 * @see MenuList
 */
class MenuListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MenuList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
