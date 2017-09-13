<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Users;

/**
 * UserSearch represents the model behind the search form about `common\models\Users`.
 */
class UserSearch extends Users
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_Id', 'Is_Locked', 'Login_Attempt', 'Is_Active', 'Role_Id', 'Organization_Id'], 'integer'],
            [['User_Name', 'Email_Id', 'Password', 'Auth_Key', 'Access_Token', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = Users::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'User_Id' => $this->User_Id,
            'Is_Locked' => $this->Is_Locked,
            'Login_Attempt' => $this->Login_Attempt,
            'Is_Active' => $this->Is_Active,
            'Role_Id' => $this->Role_Id,
            'Organization_Id' => $this->Organization_Id,
            'Created_Date' => $this->Created_Date,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'User_Name', $this->User_Name])
            ->andFilterWhere(['like', 'Email_Id', $this->Email_Id])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Auth_Key', $this->Auth_Key])
            ->andFilterWhere(['like', 'Access_Token', $this->Access_Token]);
            
        return $dataProvider;
    }
}
