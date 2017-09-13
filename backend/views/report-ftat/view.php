<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ftat */

$this->title = $model->Ftat_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ftats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Ftat_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Ftat_Id], [
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
            'Ftat_Id',
            'Organization_Id',
            'Current_Fiscal_Year',
            'Ftat_Status',
            'Created_By',
            'Last_Modified_Date',
        ],
    ]) ?>

</div>
