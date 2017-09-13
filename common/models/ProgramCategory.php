<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Program_Category}}".
 *
 * @property integer $Program_Category_Id
 * @property integer $Program_Id
 * @property integer $Category_Id
 * @property string $Created_Date
 * @property integer $Created_By
 *
 * @property Category $category
 * @property Program $program
 */
class ProgramCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Program_Category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Program_Id', 'Category_Id'], 'required'],
            [['Program_Id', 'Category_Id', 'Created_By'], 'integer'],
            [['Created_Date'], 'safe'],
            [['Category_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Category_Id' => 'Category_Id']],
            [['Program_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['Program_Id' => 'Program_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Program_Category_Id' => Yii::t('app', 'Program  Category '),
            'Program_Id' => Yii::t('app', 'Program '),
            'Category_Id' => Yii::t('app', 'Category '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['Category_Id' => 'Category_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['Program_Id' => 'Program_Id']);
    }

    /**
     * @inheritdoc
     * @return ProgramPartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgramPartnerQuery(get_called_class());
    }
}
