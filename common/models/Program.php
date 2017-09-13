<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%Program}}".
 *
 * @property integer $Program_Id
 * @property string $Program_Name
 * @property string $Program_Type
 * @property integer $Is_Active
 * @property string $Comments
 * @property integer $Org_No_Of_Times
 * @property string $Created_Date
 * @property integer $Created_By
 * @property string $Last_Modified_Date
 *
 * @property OrganizationProgram[] $organizationPrograms
 * @property User $createdBy
 * @property ProgramCategory[] $programCategories 
 * @property ProgramPartner[] $programPartners
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Program}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Program_Name', 'Program_Type', 'Org_No_Of_Times'], 'required'],
            [['Program_Name', 'Program_Type', 'Comments'], 'string'],
            [['Is_Active', 'Org_No_Of_Times', 'Created_By'], 'integer'],
            [['Created_Date', 'Last_Modified_Date'], 'safe'],
            [['Created_By'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Created_By' => 'User_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Program_Id' => Yii::t('app', 'Program '),
            'Program_Name' => Yii::t('app', 'Program  Name'),
            'Program_Type' => Yii::t('app', 'Program  Type'),
            'Is_Active' => Yii::t('app', 'Is  Active'),
            'Comments' => Yii::t('app', 'Comments'),
            'Org_No_Of_Times' => Yii::t('app', 'No of times NPO can apply'),
            'Created_Date' => Yii::t('app', 'Created  Date'),
            'Created_By' => Yii::t('app', 'Created  By'),
            'Last_Modified_Date' => Yii::t('app', 'Last  Modified  Date'),
            'Category_Id' => Yii::t('app', 'Category '),
            
        ];
    }
    public function getProgramCategories() 
    { 
                      
        return $this->hasMany(ProgramCategory::className(), ['Program_Id' => 'Program_Id']); 
    } 

   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationPrograms()
    {
        return $this->hasMany(OrganizationProgram::className(), ['Program_Id' => 'Program_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['User_Id' => 'Created_By']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramPartners()
    {
        return $this->hasMany(ProgramPartner::className(), ['Program_Id' => 'Program_Id']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramType()
    {
        return $this->hasOne(ProgramType::className(), ['Program_Type_Id' => 'Program_Type']);
    }

    

    /**
     * @inheritdoc
     * @return ProgramQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgramQuery(get_called_class());
    }
}
