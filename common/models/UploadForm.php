<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => ['pdf','png', 'jpg', 'gif', 'xls', 'xlsx', 'csv', 'csv', 'doc', 'docx', 'docm', 'csv'] , 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
//                $file->saveAs('http://localhost'.Yii::$app->request->baseUrl.'/uploads/' . $file->baseName . '.' . $file->extension);
                $file->saveAs(Yii::getAlias('@common').'/../'.'uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}

