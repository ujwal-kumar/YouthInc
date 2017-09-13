<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ftat */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ftat',
]) . $model->Ftat_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ftats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Ftat_Id, 'url' => ['view', 'id' => $model->Ftat_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ftat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
