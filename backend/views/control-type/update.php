<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ControlType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Control Type',
]) . $model->Control_Type_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Control_Type_Id, 'url' => ['view', 'id' => $model->Control_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="control-type-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
