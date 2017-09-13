<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ftat */

$this->title = Yii::t('app', 'Create Ftat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ftats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
