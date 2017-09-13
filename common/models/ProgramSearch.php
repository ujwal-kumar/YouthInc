<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Program;

/**
 * ProgramSearch represents the model behind the search form about `common\models\Program`.
 */
class ProgramSearch extends Program
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Program_Id', 'Is_Active', 'Org_No_Of_Times', 'Created_By'], 'integer'],
            [['Program_Name', 'Program_Type', 'Comments', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = Program::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Program_Id' => $this->Program_Id,
            'Is_Active' => $this->Is_Active,
            'Org_No_Of_Times' => $this->Org_No_Of_Times,
            'Created_Date' => $this->Created_Date,
            'Created_By' => $this->Created_By,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Program_Name', $this->Program_Name])
            ->andFilterWhere(['like', 'Program_Type', $this->Program_Type])
            ->andFilterWhere(['like', 'Comments', $this->Comments]);

        return $dataProvider;
    }
}
