<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Users */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User',
]) . $model->User_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->User_Id, 'url' => ['view', 'id' => $model->User_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="users-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
            'model' => $model,
            'roles' => $roles,
            'organizations' => $organizations,
    ]) ?>

</div>
