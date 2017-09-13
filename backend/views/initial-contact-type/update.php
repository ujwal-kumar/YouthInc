<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InitialContactType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Initial Contact Type',
]) . $model->Initial_Contact_Type_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Initial Contact Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Initial_Contact_Type_Id, 'url' => ['view', 'id' => $model->Initial_Contact_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="initial-contact-type-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
