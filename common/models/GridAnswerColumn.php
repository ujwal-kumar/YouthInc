<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Grid_Answer_Column}}".
 *
 * @property integer $Grid_Answer_Column_Id
 * @property string $Answer_Name
 * @property integer $Grid_Answer_Id
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property GridAnswer $gridAnswer
 */
class GridAnswerColumn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Grid_Answer_Column}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Answer_Name'], 'string'],
            [['Grid_Answer_Id'], 'required'],
            [['Grid_Answer_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Grid_Answer_Id'], 'exist', 'skipOnError' => true, 'targetClass' => GridAnswer::className(), 'targetAttribute' => ['Grid_Answer_Id' => 'Grid_Answer_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Grid_Answer_Column_Id' => Yii::t('app', 'Grid  Answer  Column '),
            'Answer_Name' => Yii::t('app', 'Answer  Name'),
            'Grid_Answer_Id' => Yii::t('app', 'Grid  Answer '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGridAnswer()
    {
        return $this->hasOne(GridAnswer::className(), ['Grid_Answer_Id' => 'Grid_Answer_Id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['Answer_Id' => 'Grid_Answer_Column_Id']);
    }

    /**
     * @inheritdoc
     * @return GridAnswerColumnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GridAnswerColumnQuery(get_called_class());
    }
}
