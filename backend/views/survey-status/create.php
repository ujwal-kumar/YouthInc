<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SurveyStatus */

$this->title = Yii::t('app', 'Create Survey Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
