<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ControlType */

$this->title = Yii::t('app', 'Create Control Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Control Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-type-create page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
