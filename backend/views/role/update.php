<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Role',
]) . $model->Role_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Role_Id, 'url' => ['view', 'id' => $model->Role_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="role-update  page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
