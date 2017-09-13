<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Program */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Program',
]) . $model->Program_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Program_Id, 'url' => ['view', 'id' => $model->Program_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="program-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= 
        $this->render('_form', [
            'model' => $model,
            'partner' => $partner,
            'prgmCat' => $prgmCat,
            'categoryList' => $categoryList,
            'partnerPrevSelect' => $partnerPrevSelect,
            'partnerTypeList' => $partnerTypeList,
            'programTypeList' => $programTypeList,
        ]) 
        ?>

</div>
