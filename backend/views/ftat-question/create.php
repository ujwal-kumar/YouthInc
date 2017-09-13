<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FtatQuestion */

$this->title = Yii::t('app', 'Create Financial Trends Analysis Question');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financial Trends Analysis Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-question-create ">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
