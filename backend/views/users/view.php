<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Users */

$this->title = $model->User_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view page-content">

    <h1><?= Html::encode($model->User_Name) ?></h1>

    <p>
        <?php Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->User_Id], ['class' => 'btn btn-primary']) ?>
        <?php echo  Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->User_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->User_Id], [
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
//            'User_Id',
            'User_Name',
            'Email_Id:email',
//            'Password',
//            'Is_Locked',
//            'Login_Attempt',
//            'Is_Active',
            [
                'attribute'=>'Is_Active',
                'value'=> (empty($model->Is_Active))? "InActive" : "Active",
            ],
//            'Role_Id',
            [
                'attribute'=>'Role_Id',
                'value'=>$model->role->Role_Name,
             ],
            [
                'attribute'=>'Organization_Id',
                'value'=> (!empty($model->Organization_Id))? $model->organization->Organization_Name : '-',
             ],
//            'Organization_Id',
//            'Auth_Key',
//            'Access_Token',
//            'Created_Date',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
