<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sysdiagrams".
 *
 * @property string $name
 * @property integer $principal_id
 * @property integer $diagram_id
 * @property integer $version
 * @property resource $definition
 */
class Sysdiagrams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sysdiagrams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'principal_id'], 'required'],
            [['name', 'definition'], 'string'],
            [['principal_id', 'version'], 'integer'],
            [['name', 'principal_id'], 'unique', 'targetAttribute' => ['name', 'principal_id'], 'message' => 'The combination of Name and Principal ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'principal_id' => Yii::t('app', 'Principal ID'),
            'diagram_id' => Yii::t('app', 'Diagram ID'),
            'version' => Yii::t('app', 'Version'),
            'definition' => Yii::t('app', 'Definition'),
        ];
    }

    /**
     * @inheritdoc
     * @return SysdiagramsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SysdiagramsQuery(get_called_class());
    }
}
