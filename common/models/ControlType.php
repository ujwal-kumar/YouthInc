<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Control_Type}}".
 *
 * @property integer $Control_Type_Id
 * @property string $Control_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Question[] $questions
 */
class ControlType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Control_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Control_Type_Name'], 'required'],
            [['Control_Type_Name'], 'string'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Control_Type_Id' => Yii::t('app', 'Control  Type  '),
            'Control_Type_Name' => Yii::t('app', 'Control  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['Control_Type_Id' => 'Control_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return ControlTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ControlTypeQuery(get_called_class());
    }
}
