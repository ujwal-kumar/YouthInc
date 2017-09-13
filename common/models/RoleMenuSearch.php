<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RoleMenu;

/**
 * RoleMenuSearch represents the model behind the search form about `common\models\RoleMenu`.
 */
class RoleMenuSearch extends RoleMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Role_Menu_Id', 'Role_Id', 'Menu_Id'], 'integer'],
            [['Created_Date', 'Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RoleMenu::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Role_Menu_Id' => $this->Role_Menu_Id,
            'Role_Id' => $this->Role_Id,
            'Menu_Id' => $this->Menu_Id,
            'Created_Date' => $this->Created_Date,
            'Modified_Date' => $this->Modified_Date,
        ]);

        return $dataProvider;
    }
}
