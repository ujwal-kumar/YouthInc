<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Partner Type',
]) . $model->Partner_Type_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Partner_Type_Id, 'url' => ['view', 'id' => $model->Partner_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="partner-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
