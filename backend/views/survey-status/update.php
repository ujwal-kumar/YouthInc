<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SurveyStatus */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Survey Status',
]) . $model->Survey_Status_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Survey_Status_Id, 'url' => ['view', 'id' => $model->Survey_Status_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="survey-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
