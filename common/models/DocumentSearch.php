<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Document;

/**
 * DocumentSearch represents the model behind the search form about `common\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Document_Id', 'Uploaded_By'], 'integer'],
            [['Document_Name', 'Document_Path', 'Created_Date', 'Last_Modified_Date'], 'safe'],
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
    public function search($params, $userId = 0)
    {
        if(!empty($userId))
        {
            $query = Document::find()->where(['Uploaded_By' => $userId]);
            
        }
        else
        {
            $query = Document::find()->orderBy(['Last_Modified_Date'=>SORT_DESC]);
        }
        

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
            'Document_Id' => $this->Document_Id,
            'Uploaded_By' => $this->Uploaded_By,
            'Created_Date' => $this->Created_Date,
            'Last_Modified_Date' => $this->Last_Modified_Date,
        ]);

        $query->andFilterWhere(['like', 'Document_Name', $this->Document_Name])
            ->andFilterWhere(['like', 'Document_Path', $this->Document_Path]);

        return $dataProvider;
    }
}
