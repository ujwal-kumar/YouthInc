<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = $model->Organization_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view page-content">

    <h1><?= Html::encode($model->Organization_Name) ?></h1>

    <p>
        <?php Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Organization_Id], ['class' => 'btn btn-primary']) ?>
        <?php echo  Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Organization_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Organization_Id], [
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
//            'Organization_Id',
            'Organization_Name',
            'Contact',
            'Designation',
//            'Initial_Contact_Type_Id',
             [
                'attribute'=>'Initial_Contact_Type_Id',
                'value'=>!empty($model->Initial_Contact_Type_Id)?$model->initialContactType->Initial_Contact_Type_Name: '-',
             ],
            'Initial_Contact_Date:date',
//            'Status_Action_Type_Id',
            [
                'attribute'=>'Status_Action_Type_Id',
                'value'=>!empty($model->Status_Action_Type_Id)?$model->statusActionType->Status_Action_Type_Name: '-',
                
            ],
            'Status_Action_Date:date',
            'Budget',
            'Youth_Served',
            'Staff_Size',
            'Board_Size',
            'Year_Incorporated',
//            'Fit',
            [
                'attribute'=>'Fit',
                'value'=> (empty($model->Fit))? "No" : "Yes",
            ],
            'Notes',
            'Program_Year_Applied',
            'Email:email',
            'Phone',
            'Mailing_Address',
            'BADV_Prospects',
            [
                'attribute'=>'Partner_Type_Id',
                'value'=>!empty($model->Partner_Type_Id)?$model->partnerType->Partner_Type_Name: '-',
                
            ],
            [
                'attribute'=>'Hiring_Type_Id',
                'value'=>!empty($model->Hiring_Type_Id)?$model->hiringType->Hiring_Type_Name: '-',
            ],
//            'Partner_Type_Id',
//            'Hiring_Type_Id',
//            'Is_Active',
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
