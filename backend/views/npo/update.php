<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Organization',
]) . $model->Organization_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Organization_Id, 'url' => ['view', 'id' => $model->Organization_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organization-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'partner' => $partner,
        'intialsTypeList' => $intialsTypeList,
        'partnerTypeList' => $partnerTypeList,
        'statusTypeList' => $statusTypeList,
        'hiringTypeList' => $hiringTypeList,
    ]) ?>

</div>
