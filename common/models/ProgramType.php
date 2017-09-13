<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Program_Type}}".
 *
 * @property integer $Program_Type_Id
 * @property string $Program_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 */
class ProgramType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Program_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Program_Type_Name'], 'required'],
            [['Program_Type_Name'], 'unique'],
            [['Program_Type_Name'], 'string'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Program_Type_Id' => Yii::t('app', 'Program  Type  '),
            'Program_Type_Name' => Yii::t('app', 'Program  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProgramTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgramTypeQuery(get_called_class());
    }
}
