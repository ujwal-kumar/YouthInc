<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Program Type',
]) . $model->Program_Type_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Program Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Program_Type_Id, 'url' => ['view', 'id' => $model->Program_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="program-type-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
