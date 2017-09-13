<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StatusActionType;

/**
 * StatusActionTypeSearch represents the model behind the search form about `common\models\StatusActionType`.
 */
class StatusActionTypeSearch extends StatusActionType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status_Action_Type_Id'], 'integer'],
            [['Status_Action_Type_Name', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = StatusActionType::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Status_Action_Type_Id' => $this->Status_Action_Type_Id,
            'Created_Date' => $this->Created_Date,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Status_Action_Type_Name', $this->Status_Action_Type_Name]);

        return $dataProvider;
    }
}
