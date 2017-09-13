<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category Type',
]) . $model->Category_Type_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Category_Type_Id, 'url' => ['view', 'id' => $model->Category_Type_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-type-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
