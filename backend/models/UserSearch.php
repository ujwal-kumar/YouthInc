<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'RoleID', 'IsActive', 'IsLocked'], 'integer'],
            [['Password', 'FirstName', 'LastName', 'Email', 'Phone', 'CreatedDate', 'LastDateModified'], 'safe'],
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
        $query = User::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'User_ID' => $this->User_ID,
            'RoleID' => $this->RoleID,
            'IsActive' => $this->IsActive,
            'IsLocked' => $this->IsLocked,
            'CreatedDate' => $this->CreatedDate,
            'LastDateModified' => $this->LastDateModified,
        ]);

        $query->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Phone', $this->Phone]);

        return $dataProvider;
    }
}
