<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = $model->Organization_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Organization_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Organization_Id], [
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
            'Organization_Id',
            'Organization_Name',
            'Contact',
            'Designation',
            'Initial_Contact_Type_Id',
            'Initial_Contact_Date',
            'Status_Action_Type_Id',
            'Status_Action_Date',
            'Budget',
            'Youth_Served',
            'Staff_Size',
            'Board_Size',
            'Year_Incorporated',
            'Fit',
            'Notes',
            'Program_Year_Applied',
            'Email:email',
            'Phone',
            'Mailing_Address',
            'BADV_Prospects',
            'Partner_Type_Id',
            'Hiring_Type_Id',
            'Is_Active',
            'Is_Approved',
            'Is_Updated',
            'Created_Date',
            'Created_By',
            'Last_Modified_Date',
        ],
    ]) ?>

</div>
