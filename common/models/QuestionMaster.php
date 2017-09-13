<?php

namespace common\models;

use Yii;
use common\models\OrgQuestionMapping;

/**
 * This is the model class for table "{{%QuestionMaster}}".
 *
 * @property integer $Question_ID
 * @property string $QuestionName
 * @property integer $Category_ID
 * @property integer $IsActive
 * @property string $ControlType
 * @property integer $DisplayOrder
 * @property string $CreatedDate
 * @property string $ModifiedDate
 *
 * @property AnswerMaster[] $answerMasters
 * @property OrgQuestionMapping[] $orgQuestionMappings
 * @property Organization[] $orgs
 * @property Category $category
 * @property SurveyDetails[] $surveyDetails
 */
class QuestionMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%QuestionMaster}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['QuestionName', 'Category_ID', 'ControlType', 'DisplayOrder', 'CreatedDate', 'ModifiedDate'], 'required'],
            [['QuestionName', 'ControlType'], 'string'],
            [['Category_ID', 'IsActive', 'DisplayOrder'], 'integer'],
            [['CreatedDate', 'ModifiedDate'], 'safe'],
            [['Category_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_ID' => 'Category_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Question_ID' => Yii::t('app', 'Question '),
            'QuestionName' => Yii::t('app', 'Question Name'),
            'Category_ID' => Yii::t('app', 'Category '),
            'IsActive' => Yii::t('app', 'Is Active'),
            'ControlType' => Yii::t('app', 'Control Type'),
            'DisplayOrder' => Yii::t('app', 'Display Order'),
            'CreatedDate' => Yii::t('app', 'Created Date'),
            'ModifiedDate' => Yii::t('app', 'Modified Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerMasters()
    {
        return $this->hasMany(AnswerMaster::className(), ['Question_ID' => 'Question_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgQuestionMappings()
    {
        return $this->hasMany(OrgQuestionMapping::className(), ['Question_ID' => 'Question_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getSurvey()
//    {
//        return $this->hasMany(Survey::className(), ['Org_ID' => 'Org_ID'])->viaTable('{{%OrgQuestionMapping}}', ['Question_ID' => 'Question_ID']);;
//    }
    
    public function getOrgs()
    {
        return $this->hasMany(Organization::className(), ['Org_ID' => 'Org_ID'])->viaTable('{{%OrgQuestionMapping}}', ['Question_ID' => 'Question_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['Category_ID' => 'Category_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyDetails()
    {
        return $this->hasMany(SurveyDetails::className(), ['Question_ID' => 'Question_ID']);
    }
    public function getQuestionNo($orgId, $userId)
    {
         $result = \Yii::$app->db->createCommand("SELECT count (Question_ID) 
                        FROM [OrgQuestionMapping] where Org_ID = $orgId") ;
//                    ->bindValue(':paramName1' , $username, \PDO::PARAM_STR )
//                    ->bindValue(':paramName2', $password,  \PDO::PARAM_STR);
                    //->execute();
        if($result->query())
           $result = $result->query()->readAll();
        else
            $result = "no result";
        return $result;
    }

    /**
     * @inheritdoc
     * @return QuestionMasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionMasterQuery(get_called_class());
    }
}
