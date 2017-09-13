<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Message;

/**
 * NotificationSearch represents the model behind the search form about `common\models\Message`.
 */
class NotificationSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Message_Id', 'User_Id'], 'integer'],
            [['Message_Content', 'Status', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = Message::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Message_Id' => $this->Message_Id,
            'User_Id' => $this->User_Id,
            'Created_Date' => $this->Created_Date,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Message_Content', $this->Message_Content])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
