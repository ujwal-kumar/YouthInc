<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FtatQuestion */

$this->title = $model->Ftat_Question_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ftat Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-question-view">

    <h1><?= Html::encode($model->Question_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Ftat_Question_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php 
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Ftat_Question_Id], [
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
            'Ftat_Question_Id',
            'Question_Name',
//            'Created_By',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
