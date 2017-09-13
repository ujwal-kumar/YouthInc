<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Ftat_Transaction}}".
 *
 * @property integer $Ftat_Transaction_Id
 * @property integer $Ftat_Question_Id
 * @property integer $Ftat_Id
 * @property string $Prev_3yrs_Stat
 * @property string $Prev_2yrs_Stat
 * @property string $Prev_1yrs_Stat
 * @property string $Curr_Yr_Stat
 * @property string $Description
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property FtatQuestion $ftat
 * @property FtatQuestion $ftatQuestion
 */
class FtatTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Ftat_Transaction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ftat_Question_Id'], 'required'],
            [['Ftat_Question_Id', 'Ftat_Id', 'Created_By'], 'integer'],
            [['Prev_3yrs_Stat', 'Prev_2yrs_Stat', 'Prev_1yrs_Stat', 'Curr_Yr_Stat', 'Description'], 'string'],
            [['Last_Modified_Date'], 'safe'],
            [['Ftat_Id'], 'exist', 'skipOnError' => true, 'targetClass' => FtatQuestion::className(), 'targetAttribute' => ['Ftat_Id' => 'Ftat_Question_Id']],
            [['Ftat_Question_Id'], 'exist', 'skipOnError' => true, 'targetClass' => FtatQuestion::className(), 'targetAttribute' => ['Ftat_Question_Id' => 'Ftat_Question_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Ftat_Transaction_Id' => Yii::t('app', 'Ftat  Transaction  ID'),
            'Ftat_Question_Id' => Yii::t('app', 'Ftat  Question  ID'),
            'Ftat_Id' => Yii::t('app', 'Ftat  ID'),
            'Prev_3yrs_Stat' => Yii::t('app', 'Prev 3yrs  Stat'),
            'Prev_2yrs_Stat' => Yii::t('app', 'Prev 2yrs  Stat'),
            'Prev_1yrs_Stat' => Yii::t('app', 'Prev 1yrs  Stat'),
            'Curr_Yr_Stat' => Yii::t('app', 'Curr  Yr  Stat'),
            'Description' => Yii::t('app', 'Description'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFtat()
    {
        return $this->hasOne(Ftat::className(), ['Ftat_Id' => 'Ftat_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFtatQuestion()
    {
        return $this->hasOne(FtatQuestion::className(), ['Ftat_Question_Id' => 'Ftat_Question_Id']);
    }

    /**
     * @inheritdoc
     * @return FtatTransactionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FtatTransactionQuery(get_called_class());
    }
}
