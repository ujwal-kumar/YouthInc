<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->Category_Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view page-content">

    <h1><?= Html::encode($model->Category_Name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $model->Category_Id], ['class' => 'btn btn-primary btn-edit-popup']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Category_Id], [
            'class' => 'btn  btn-primary btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Category_Id',
            'Category_Name',
//            'Is_Child',
            [
                'attribute'=>'Is_Child',
                'value'=> (!empty($model->Is_Child))? "Yes" : "No",
            ],
//            'Parent_Category_Id',
            [
                'attribute' => 'Parent_Category_Id',
                'label' => 'Parent Category',
                'value' => (!empty($model->parentCategory)) ? $model->parentCategory->Category_Name : '', // or use 'usertable.name'
             ],
//            [
//                'attribute' => 'Category_Type_Id',
//                'value' => (!empty($model->categoryType)) ? $model->parentCategory->Category_Type_Name : '', // or use 'usertable.name'
//             ],
//            'Category_Type_Id',
//            'Created_Date',
//            'Last_Modified_Date',
        ],
    ]) ?>

</div>
