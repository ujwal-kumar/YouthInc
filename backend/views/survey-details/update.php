<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SurveyDetails */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Survey Details',
]) . $model->SurveyDetail_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SurveyDetail_ID, 'url' => ['view', 'id' => $model->SurveyDetail_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="survey-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
