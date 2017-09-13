<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Ftat_Question}}".
 *
 * @property integer $Ftat_Question_Id
 * @property string $Question_Name
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property FtatTransaction[] $ftatTransactions
 * @property FtatTransaction[] $ftatTransactions0
 */
class FtatQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Ftat_Question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Question_Name'], 'required'],
            [['Question_Name'], 'string'],
            [['Created_By'], 'integer'],
            [['Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Ftat_Question_Id' => Yii::t('app', 'Ftat  Question  ID'),
            'Question_Name' => Yii::t('app', 'Question  Name'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFtatTransactions()
    {
        return $this->hasMany(FtatTransaction::className(), ['Ftat_Id' => 'Ftat_Question_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFtatTransactions0()
    {
        return $this->hasMany(FtatTransaction::className(), ['Ftat_Question_Id' => 'Ftat_Question_Id']);
    }

    /**
     * @inheritdoc
     * @return FtatQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FtatQuestionQuery(get_called_class());
    }
}
