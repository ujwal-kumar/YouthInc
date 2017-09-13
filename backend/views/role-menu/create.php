<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RoleMenu */

$this->title = Yii::t('app', 'Create Role Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Role Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
