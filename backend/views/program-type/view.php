<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramType */

$this->title = $model->Program_Type_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Program Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-type-view">

    <h1><?= Html::encode($model->Program_Type_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Program_Type_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Program_Type_Id], [
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
//            'Program_Type_Id',
            'Program_Type_Name',
//            'Created_Date',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
