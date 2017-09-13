<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProgramType */

$this->title = Yii::t('app', 'Create Program Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Program Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-type-create page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
