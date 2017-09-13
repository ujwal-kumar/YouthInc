<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InitialContactType */

$this->title = Yii::t('app', 'Create Initial Contact Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Initial Contact Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="initial-contact-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
