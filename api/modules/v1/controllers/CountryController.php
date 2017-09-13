<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountryController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Country';  
    
    public function actionView($id)
    {
        echo $id;
        die('atinek');
        return Country::findOne($id);
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['view'], $actions['update']);
        return $actions;
    }
}


