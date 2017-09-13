<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Organization;

/**
 * ReportOrganizationSearch represents the model behind the search form about `common\models\Organization`.
 */
class ReportOrganizationSearch extends Organization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Organization_Id', 'Initial_Contact_Type_Id', 'Status_Action_Type_Id', 'Youth_Served', 'Staff_Size', 'Board_Size', 'Year_Incorporated', 'Fit', 'Program_Year_Applied', 'Partner_Type_Id', 'Hiring_Type_Id', 'Is_Active', 'Status', 'Is_Updated', 'Created_By'], 'integer'],
            [['Organization_Name', 'Contact', 'Designation', 'Initial_Contact_Date', 'Status_Action_Date', 'Notes', 'Email', 'Phone', 'Mailing_Address', 'BADV_Prospects', 'Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Budget'], 'number'],
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
        $query = Organization::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Organization_Id' => $this->Organization_Id,
            'Initial_Contact_Type_Id' => $this->Initial_Contact_Type_Id,
            'Initial_Contact_Date' => $this->Initial_Contact_Date,
            'Status_Action_Type_Id' => $this->Status_Action_Type_Id,
            'Status_Action_Date' => $this->Status_Action_Date,
            'Budget' => $this->Budget,
            'Youth_Served' => $this->Youth_Served,
            'Staff_Size' => $this->Staff_Size,
            'Board_Size' => $this->Board_Size,
            'Year_Incorporated' => $this->Year_Incorporated,
            'Fit' => $this->Fit,
            'Program_Year_Applied' => $this->Program_Year_Applied,
            'Partner_Type_Id' => $this->Partner_Type_Id,
            'Hiring_Type_Id' => $this->Hiring_Type_Id,
            'Is_Active' => $this->Is_Active,
            'Status' => $this->Status,
            'Is_Updated' => $this->Is_Updated,
            'Created_Date' => $this->Created_Date,
            'Created_By' => $this->Created_By,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Organization_Name', $this->Organization_Name])
            ->andFilterWhere(['like', 'Contact', $this->Contact])
            ->andFilterWhere(['like', 'Designation', $this->Designation])
            ->andFilterWhere(['like', 'Notes', $this->Notes])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Phone', $this->Phone])
            ->andFilterWhere(['like', 'Mailing_Address', $this->Mailing_Address])
            ->andFilterWhere(['like', 'BADV_Prospects', $this->BADV_Prospects]);

        return $dataProvider;
    }
}
