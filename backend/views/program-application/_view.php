<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationProgram */

$this->title = $model->Org_Program_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-program-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Org_Program_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Org_Program_Id], [
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
            'Org_Program_Id',
            'Organization_Id',
            'Program_Id',
            'Year',
            'Is_Approved',
            'Created_Date',
            'Created_By',
            'Last_Modified_Date',
        ],
    ]) ?>

</div>
