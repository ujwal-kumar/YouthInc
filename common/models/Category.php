<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Category}}".
 *
 * @property integer $Category_Id
 * @property string $Category_Name
 * @property integer $Is_Child
 * @property integer $Parent_Category_Id
 * @property integer $Category_Type_Id
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Category $parentCategory
 * @property Category[] $categories
 * @property CategoryType $categoryType
 * @property Question[] $questions
 * @property SurveyTransaction[] $surveyTransactions
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Category_Name'], 'required'],
            
            [['Category_Name'], 'unique'],
            
            [[ 'Parent_Category_Id'], 'required', 'when' => function($model) {
                if(!empty($model->Is_Child))
                    return true;
                
            }],
            [[ 'Category_Type_Id'], 'required', 'when' => function($model) {
                
                if(empty($model->Is_Child))
                    return true;
            }],
            [['Category_Name'], 'string'],
            
            [['Is_Child', 'Parent_Category_Id', 'Category_Type_Id'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Parent_Category_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['Parent_Category_Id' => 'Category_Id']],
            [['Category_Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryType::className(), 'targetAttribute' => ['Category_Type_Id' => 'Category_Type_Id']],
//            [['Parent_Category_Id'], 'validateCategory'],
        ];
    }
    
    public function validateCategory($attribute, $params, $validator)
    {
        echo $this->$attribute;
        pr($attribute);
        prd($params);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Category_Id' => Yii::t('app', 'Category '),
            'Category_Name' => Yii::t('app', 'Category  Name'),
            'Is_Child' => Yii::t('app', 'Is  Child'),
            'Parent_Category_Id' => Yii::t('app', 'Parent  Category '),
            'Category_Type_Id' => Yii::t('app', 'Category  Type '),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(Category::className(), ['Category_Id' => 'Parent_Category_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['Parent_Category_Id' => 'Category_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryType()
    {
        return $this->hasOne(CategoryType::className(), ['Category_Type_Id' => 'Category_Type_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['Category_Id' => 'Category_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTransactions()
    {
        return $this->hasMany(SurveyTransaction::className(), ['Category_Id' => 'Category_Id']);
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
