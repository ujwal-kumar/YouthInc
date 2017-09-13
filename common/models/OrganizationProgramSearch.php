<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrganizationProgram;

/**
 * OrganizationProgramSearch represents the model behind the search form about `common\models\OrganizationProgram`.
 */
class OrganizationProgramSearch extends OrganizationProgram
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Org_Program_Id', 'Organization_Id', 'Program_Id', 'Year', 'Is_Approved', 'Created_By'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = OrganizationProgram::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Org_Program_Id' => $this->Org_Program_Id,
            'Organization_Id' => $this->Organization_Id,
            'Program_Id' => $this->Program_Id,
            'Year' => $this->Year,
            'Is_Approved' => $this->Is_Approved,
            'Created_Date' => $this->Created_Date,
            'Created_By' => $this->Created_By,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        return $dataProvider;
    }
}
