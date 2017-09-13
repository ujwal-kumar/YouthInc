<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = Yii::t('app', "$model->Organization_Name", [
    'modelClass' => 'NPO',
]) . $model->Organization_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Organization_Id, 'url' => ['view', 'id' => $model->Organization_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organization-update page-content">

    <h1><?= Html::encode($model->Organization_Name) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php
    
    $this->registerJs(''
            . ''
//            .'$(".dropdown-modal").click(function(){ $(this).toggleClass("open")});'
            . '', \yii\web\VIEW::POS_READY);
?></div>

