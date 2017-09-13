<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category',
]) . $model->Category_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Category_Id, 'url' => ['view', 'id' => $model->Category_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update page-content">

    <h1><?= Html::encode($model->Category_Name) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoryList' => $categoryList,
        'categoryTypeList' => $categoryTypeList,
    ]) ?>

</div>
