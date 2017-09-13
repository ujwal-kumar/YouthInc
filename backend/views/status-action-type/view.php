<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StatusActionType */

$this->title = $model->Status_Action_Type_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status Action Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-action-type-view">

    <h1><?= Html::encode($model->Status_Action_Type_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Status_Action_Type_Id], ['class' => 'btn btn-primary  btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Status_Action_Type_Id], [
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
//            'Status_Action_Type_Id',
            'Status_Action_Type_Name',
//            'Created_Date',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
