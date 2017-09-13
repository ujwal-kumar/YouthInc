<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerType */

$this->title = $model->Partner_Type_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-type-view page-content">

    <h1><?= Html::encode($model->Partner_Type_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Partner_Type_Id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Partner_Type_Id], [
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
//            'Partner_Type_Id',
            'Partner_Type_Name',
//            'Created_Date',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
