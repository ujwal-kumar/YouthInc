<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%FMA_Rating}}".
 *
 * @property integer $Rating_Id
 * @property integer $Organization_Id
 * @property string $Category_Name
 * @property string $Question_Name
 * @property string $Rating_Notes
 * @property integer $Score
 * @property integer $Weight
 * @property integer $Total_Score
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property Organization $organization
 * @property User $createdBy
 */
class FMARating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%FMA_Rating}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Organization_Id', 'Score', 'Weight', 'Total_Score', 'Created_By'], 'integer'],
            [['Category_Name', 'Question_Name', 'Rating_Notes'], 'string'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Organization_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['Organization_Id' => 'Organization_Id']],
            [['Created_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Created_By' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Rating_Id' => Yii::t('app', 'Rating '),
            'Organization_Id' => Yii::t('app', 'Organization '),
            'Category_Name' => Yii::t('app', 'Category  Name'),
            'Question_Name' => Yii::t('app', 'Question  Name'),
            'Rating_Notes' => Yii::t('app', 'Rating  Notes'),
            'Score' => Yii::t('app', 'Score'),
            'Weight' => Yii::t('app', 'Weight'),
            'Total_Score' => Yii::t('app', 'Total  Score'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['Organization_Id' => 'Organization_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Created_By']);
    }

    /**
     * @inheritdoc
     * @return FMARatingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FMARatingQuery(get_called_class());
    }
}
