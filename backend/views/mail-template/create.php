<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MailTemplate */

$this->title = Yii::t('app', 'Create Mail Template');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mail Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-template-create page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
