<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatusActionType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Status Action Type',
]) . $model->Status_Action_Type_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status Action Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Status_Action_Type_Id, 'url' => ['view', 'id' => $model->Status_Action_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="status-action-type-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
