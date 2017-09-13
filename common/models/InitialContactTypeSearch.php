<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InitialContactType;

/**
 * InitialContactTypeSearch represents the model behind the search form about `common\models\InitialContactType`.
 */
class InitialContactTypeSearch extends InitialContactType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Initial_Contact_Type_Id'], 'integer'],
            [['Initial_Contact_Type_Name', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = InitialContactType::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Initial_Contact_Type_Id' => $this->Initial_Contact_Type_Id,
            'Created_Date' => $this->Created_Date,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Initial_Contact_Type_Name', $this->Initial_Contact_Type_Name]);

        return $dataProvider;
    }
}
