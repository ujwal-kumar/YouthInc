<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Question',
]) . $model->Question_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Question_Id, 'url' => ['view', 'id' => $model->Question_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="question-update">

    <h1><?= Html::encode($model->Question_Name) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'answers' => $answers,
        'initiated' => $initiated,       
        'controlTypeList' => $controlTypeList,
        'categoryTypeList' => $categoryTypeList,
        
    ]) ?>

</div>
