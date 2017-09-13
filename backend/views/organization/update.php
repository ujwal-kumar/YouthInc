<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Organization',
]) . $model->Org_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Org_ID, 'url' => ['view', 'id' => $model->Org_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organization-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
