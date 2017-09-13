<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SurveyDetails;

/**
 * SurveyDetailsSearch represents the model behind the search form about `common\models\SurveyDetails`.
 */
class SurveyDetailsSearch extends SurveyDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SurveyDetail_ID', 'Survey_ID', 'Question_ID', 'Answer_ID'], 'integer'],
            [['FilePath', 'CreatedDate', 'ModifiedDate'], 'safe'],
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
        $query = SurveyDetails::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'SurveyDetail_ID' => $this->SurveyDetail_ID,
            'Survey_ID' => $this->Survey_ID,
            'Question_ID' => $this->Question_ID,
            'Answer_ID' => $this->Answer_ID,
            'CreatedDate' => $this->CreatedDate,
            'ModifiedDate' => $this->ModifiedDate,
        ]);

        $query->andFilterWhere(['like', 'FilePath', $this->FilePath]);

        return $dataProvider;
    }
}
