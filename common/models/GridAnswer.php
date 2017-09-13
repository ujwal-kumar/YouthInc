<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Grid_Answer}}".
 *
 * @property integer $Grid_Answer_Id
 * @property string $Answer_Name
 * @property integer $Question_Id
 * @property string $Field_Type
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property Question $question
 */
class GridAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Grid_Answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Answer_Name', 'Field_Type'], 'string'],
            [['Question_Id', 'Created_By'], 'integer'],
            [['Field_Type'], 'required'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Question_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['Question_Id' => 'Question_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Grid_Answer_Id' => Yii::t('app', 'Grid  Answer '),
            'Answer_Name' => Yii::t('app', 'Answer  Name'),
            'Question_Id' => Yii::t('app', 'Question'),
            'Field_Type' => Yii::t('app', 'Field  Type'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }
    
    /**
    * @return \yii\db\ActiveQuery 
    */ 
    public function getGridAnswerColumns() 
    { 
        return $this->hasMany(GridAnswerColumn::className(), ['Grid_Answer_Id' => 'Grid_Answer_Id']); 
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['Question_Id' => 'Question_Id']);
    }

    /**
     * @inheritdoc
     * @return GridAnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GridAnswerQuery(get_called_class());
    }
}
