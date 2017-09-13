<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationProgram */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Organization Program',
]) . $model->Org_Program_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Org_Program_Id, 'url' => ['view', 'id' => $model->Org_Program_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organization-program-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
