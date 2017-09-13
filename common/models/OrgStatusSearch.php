<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrgStatus;

/**
 * OrgStatusSearch represents the model behind the search form about `common\models\OrgStatus`.
 */
class OrgStatusSearch extends OrgStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Org_Status_Id'], 'integer'],
            [['Org_Status_Description'], 'safe'],
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
        $query = OrgStatus::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Org_Status_Id' => $this->Org_Status_Id,
        ]);

        $query->andFilterWhere(['like', 'Org_Status_Description', $this->Org_Status_Description]);

        return $dataProvider;
    }
}
