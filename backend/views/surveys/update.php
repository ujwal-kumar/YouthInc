<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Survey */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Survey',
]) . $model->Survey_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Survey_ID, 'url' => ['view', 'id' => $model->Survey_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="survey-update  page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
