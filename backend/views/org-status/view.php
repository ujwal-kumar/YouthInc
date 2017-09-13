<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrgStatus */

$this->title = $model->Org_Status_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-status-view">

    <h1><?= Html::encode($model->Org_Status_Description) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Org_Status_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Org_Status_Id], [
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
//            'Org_Status_Id',
            'Org_Status_Description',
        ],
    ]) ?>

</div>
