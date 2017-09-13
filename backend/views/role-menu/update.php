<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RoleMenu */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Role Menu',
]) . $model->Role_Menu_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Role Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Role_Menu_Id, 'url' => ['view', 'id' => $model->Role_Menu_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="role-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
