<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = $model->Role_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-view page-content">

    <h1><?= Html::encode($model->Role_Name) ?></h1>

    <p>
        <?php Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Role_Id], ['class' => 'btn btn-primary']) ?>
        <?php echo  Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Role_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Role_Id], [
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
//            'Role_Id',
            'Role_Name',
            'Description',
            [
                'attribute'=>'Is_Active',
                'value'=> (empty($model->Is_Active))? "InActive" : "Active",
            ],
//            'Created_Date',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
