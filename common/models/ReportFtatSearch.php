<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ftat;

/**
 * ReportFtatSearch represents the model behind the search form about `common\models\Ftat`.
 */
class ReportFtatSearch extends Ftat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ftat_Id', 'Organization_Id', 'Ftat_Status', 'Created_By'], 'integer'],
            [['Current_Fiscal_Year', 'Last_Modified_Date'], 'safe'],
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
        $query = Ftat::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Ftat_Id' => $this->Ftat_Id,
            'Organization_Id' => $this->Organization_Id,
            'Current_Fiscal_Year' => $this->Current_Fiscal_Year,
            'Ftat_Status' => $this->Ftat_Status,
            'Created_By' => $this->Created_By,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        return $dataProvider;
    }
}
