<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FtatQuestion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Financial Trends Analysis Question',
]) . $model->Ftat_Question_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financial Trends Analysis Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Ftat_Question_Id, 'url' => ['view', 'id' => $model->Ftat_Question_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ftat-question-update">

    <h1><?= Html::encode($model->Question_Name) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
