<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrgStatus */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Org Status',
]) . $model->Org_Status_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Org_Status_Id, 'url' => ['view', 'id' => $model->Org_Status_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="org-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
