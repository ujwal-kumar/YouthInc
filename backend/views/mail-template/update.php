<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MailTemplate */

$this->title = Yii::t('app', 'Update : ', [
    'modelClass' => 'Mail Template',
]) . $model->Template_Name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mail Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Mail_Id, 'url' => ['view', 'id' => $model->Mail_Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="mail-template-update page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
