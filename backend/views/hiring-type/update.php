<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HiringType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Hiring Type',
]) . $model->Hiring_Type_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hiring Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Hiring_Type_Id, 'url' => ['view', 'id' => $model->Hiring_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="hiring-type-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
