<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MailTemplate;

/**
 * MailTemplateSearch represents the model behind the search form about `common\models\MailTemplate`.
 */
class MailTemplateSearch extends MailTemplate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Mail_Id'], 'integer'],
            [['Template_Name', 'Template_Slug', 'Mail_Sender', 'Mail_Subject', 'Mail_Body', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
        $query = MailTemplate::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);

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
            'Mail_Id' => $this->Mail_Id,
            'Created_Date' => $this->Created_Date,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Template_Name', $this->Template_Name])
            ->andFilterWhere(['like', 'Template_Slug', $this->Template_Slug])
            ->andFilterWhere(['like', 'Mail_Sender', $this->Mail_Sender])
            ->andFilterWhere(['like', 'Mail_Subject', $this->Mail_Subject])
            ->andFilterWhere(['like', 'Mail_Body', $this->Mail_Body]);

        return $dataProvider;
    }
}
