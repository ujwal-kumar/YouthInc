<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = $model->Question_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

    <h1><?= Html::encode($model->Question_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Question_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Question_Id], [
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
//            'Question_Id',
            'Question_Name',
//            'Category_Id',
//            'Control_Type_Id',
            
            [
                'attribute'=>'Category_Id',
                'value'=> $model->category->Category_Name,
            ],
            [
                'attribute'=>'Control_Type_Id',
                'value'=> $model->controlType->Control_Type_Name,
            ],
            [
                'attribute'=>'Is_Active',
                'value'=> (empty($model->Is_Active))? "InActive" : "Active",
            ],
//            'Created_Date',
//            'Created_By',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
