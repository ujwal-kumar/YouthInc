<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Program */

$this->title = $model->Program_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-view">

    <h1><?= Html::encode($model->Program_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Program_Id], ['class' => 'btn btn-primary  btn-edit-popup']) ?>
        <?php  Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Program_Id], [
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
//            'Program_Id',
            'Program_Name',
//            'Program_Type',
//            'Partner_Type_Id',
            [
                'attribute'=>'Program_Type',
                'value'=> $model->programType->Program_Type_Name,
            ],
//            [
//                'attribute'=>'Partner_Type_Id',
//                'value'=> $model->partnerType->Partner_Type_Name,
//            ],
//            'Is_Active',
//            'Comments',
            'Org_No_Of_Times',
            [
                'attribute'=>'Is_Active',
                'value'=> (empty($model->Is_Active))? "InActive" : "Active",
            ]
//            'Created_Date',
//            'Created_By',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
