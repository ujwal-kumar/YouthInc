<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Category_Type}}".
 *
 * @property integer $Category_Type_Id
 * @property string $Category_Type_Name
 * @property string $Created_Date
 * @property string $Last_Modified_Date
 *
 * @property Category[] $categories
 */
class CategoryType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Category_Type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Category_Type_Name'], 'string'],
            [['Category_Type_Name'], 'required'],
            [['Category_Type_Name'], 'unique'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Category_Type_Id' => Yii::t('app', 'Category  Type '),
            'Category_Type_Name' => Yii::t('app', 'Category  Type  Name'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['Category_Type_Id' => 'Category_Type_Id']);
    }

    /**
     * @inheritdoc
     * @return CategoryTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryTypeQuery(get_called_class());
    }
}
