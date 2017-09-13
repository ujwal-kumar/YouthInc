<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FtatQuestion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ftat Question',
]) . $model->Ftat_Question_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ftat Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Ftat_Question_Id, 'url' => ['view', 'id' => $model->Ftat_Question_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ftat-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
