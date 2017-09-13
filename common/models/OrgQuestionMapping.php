<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%OrgQuestionMapping}}".
 *
 * @property integer $Org_ID
 * @property integer $Question_ID
 * @property string $CreatedDate
 * @property string $ModifiedDate
 *
 * @property Organization $org
 * @property QuestionMaster $question
 */
class OrgQuestionMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%OrgQuestionMapping}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Org_ID', 'Question_ID'], 'required'],
            [['Org_ID', 'Question_ID'], 'integer'],
            [['CreatedDate', 'ModifiedDate'], 'safe'],
            [['Org_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Org_ID' => 'Org_ID']],
            [['Question_ID'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionMaster::className(), 'targetAttribute' => ['Question_ID' => 'Question_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Org_ID' => Yii::t('app', 'Org '),
            'Question_ID' => Yii::t('app', 'Question '),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'ModifiedDate' => Yii::t('app', 'Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organization::className(), ['Org_ID' => 'Org_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(QuestionMaster::className(), ['Question_ID' => 'Question_ID']);
    }

    /**
     * @inheritdoc
     * @return OrgQuestionMappingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrgQuestionMappingQuery(get_called_class());
    }
}
