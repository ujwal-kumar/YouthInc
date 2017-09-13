<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SurveyDetails */

$this->title = $model->SurveyDetail_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->SurveyDetail_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->SurveyDetail_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'SurveyDetail_ID',
            'Survey_ID',
            'Question_ID',
            'Answer_ID',
            'FilePath',
            'CreatedDate',
            'ModifiedDate',
        ],
    ]) ?>

</div>
